<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function upload_image(Request $request){
        $file = $this->store_file([
            'source'=>$request->upload,
            'validation'=>"image",
            'path_to_save'=>'/uploads/images/',
            'type'=>'IMAGE', 
            'user_id'=>\Auth::user()->id,
            'resize'=>[500,1000],
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            /*'watermark'=>true,*/
            'compress'=>'auto'
        ]); 
        return [
            'fileName'=>$file['filename'],
            'uploaded'=>1,
            'url'=>env('STORAGE_URL')."/uploads/images/".$file['filename'] ];
    }


    public function use_file(Request $request)
    {
        return $this->use_file($request->name);
    }
    public function remove_file(Request $request)
    {
        return $this->remove_hub_file($request->name);
    }
    public function upload_file(Request $request)
    {
        return $this->store_file([
            'source'=>$request->file,
            'validation'=>"image",
            'path_to_save'=>'/uploads/uploads/',
            'type'=>'uploads', 
            'user_id'=>$request->user_id,
            'resize'=>[500,3000],
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>'production',
            'watermark'=>true,
            'compress'=>'auto'
        ]);  
    }
    public function robots(){
        return "Sitemap: ".env('APP_URL')."/sitemap.xml\nUser-agent: *";
    }
    public function manifest(){ 
        $manifest = [
            "name"             => env('APP_NAME'),
            "short_name"       => env('APP_NAME'),
            "start_url"        => env('APP_URL'),
            "display"          => "standalone",
            "theme_color"      => "#243c6d",
            "background_color" => "#1565c0",
            "orientation"      => "portrait",
            "icons"            => [
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "36x36",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "48x48",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "60x60",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "72x72",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "76x76",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "96x96",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "120x120",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "152x152",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "180x180",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "192x192",
                    "type"  => "image/png",
                ],
                [
                    "src"   => asset('/images/default/logo.png'),
                    "sizes" => "512x512",
                    "type"  => "image/png",
                ],
            ],
        ];
        return $manifest;
    }
    public function blocked_user(){
        return "عفواً الحساب الخاص بك غير فعال - Sorry , Your Account Is Not Active";
    }  
}
