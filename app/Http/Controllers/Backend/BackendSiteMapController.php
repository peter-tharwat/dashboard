<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
class BackendSiteMapController extends Controller
{
    public $items_per_page =  5000 ;
    public $data;
    public $custom_links;
 
    public function __construct()
    {
        $this->custom_links= [
            route('home')
        ];
        $this->data= collect([
            [
                'name'=>"articles",
                'index_route_name'=>"articles.index",
                'show_route_name'=>"article.show",
                'data'=>\App\Models\Article::query(),
            ],
        ]);
    }
    public function sitemap_init(Request $request){
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 2021 05:00:00 GMT");
    }
    public function viewer(Request $request,$name,$page){
        $request->merge([
            'name'=>$name,
            'page'=>$page
        ]);
        $request->validate([
            'name'=>'required|in:'.implode(',',$this->data->pluck('name')->toArray()),
            'page'=>'required|integer|min:0,max:10000'
        ]);

        $urls  = [];
        $items = $this->data->where('name',$request->name)->first()['data']->simplePaginate($this->items_per_page);
        $route = $this->data->where('name',$request->name)->first()['show_route_name'];
        foreach($items as $item){
            $url='<url><loc>'.str_replace('&','-',route($route,$item)).'</loc><priority>1.0</priority><lastmod>'.gmdate(DateTime::W3C, strtotime($item->updated_at)).'</lastmod></url>';
            array_push($urls,$url);
        } 
        $urls=implode('',$urls);
        return response('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'.$urls.'</urlset>', 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    public function generator($items=[]){
        $urls=[];
        foreach($items as $item){
            for($i=1; $i< ceil($item['data']->count()/$this->items_per_page)+1;$i++ ){
                $url='<sitemap><loc>'.env("APP_URL").'/sitemaps/'.$item['name'].'/'.$i.'/sitemap.xml</loc></sitemap>';
                array_push($urls,$url);
            }
        } 
        array_push($urls , '<sitemap><loc>'.env('APP_URL').'/sitemaps/links'.'</loc></sitemap>');
        $urls=implode('',$urls);

        return response('<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.$urls.'</sitemapindex>', 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    public function custom_links(){
        $urls  = [];
        foreach($this->custom_links as $custom_link){
            $url='<url><loc>'.$custom_link.'</loc><priority>1.0</priority><lastmod>'.gmdate(DateTime::W3C, strtotime(date('Y-m-d'))).'</lastmod></url>';
            array_push($urls,$url);
        } 
        $urls=implode('',$urls);
        return response('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">'.$urls.'</urlset>', 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
    public function sitemap(Request $request)
    {
        $this->sitemap_init($request);
        if(count($this->data))
            return $this->generator($this->data);
    }
}
