<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendHelperController extends Controller
{
    public function upload_image(Request $request){
        $file = $this->store_file([
            'source'=>$request->upload!=null?$request->upload:$request->file,
            'validation'=>"image",
            'path_to_save'=>'/uploads/images/',
            'type'=>'IMAGE', 
            'user_id'=>\Auth::user()->id,
            'resize'=>[500,1000],
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'new_extension'=>"webp",
            'optimize'=>true,
            'temp_file_selector'=>$request->temp_file_selector
        ]); 
        return [
            'fileName'=>$file['filename'],
            'uploaded'=>1,
            'success'=>true,
            "hasWarnings"=>false,
            "isSuccess"=>true,
            "warnings"=>[],
            'location'=>$file['link'],
            'file'=>$file['link'],
            'url'=>$file['link'],
            'files'=>$file['files'] 
            
        ];
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
            'user_id'=>\Auth::user()->id,
            'resize'=>[500,3000],
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'new_extension'=>"webp",
            'optimize'=>true
        ]);  
    }
    public function robots(){
        $settings = (new \App\Helpers\SettingsHelper)->getAllSettings();
        return response($settings['robots_txt'])->header('Content-Type', 'text/plain');
    }
    public function manifest(){ 
        $settings = (new \App\Helpers\SettingsHelper)->getAllSettings();
        $manifest = [
            "name"             => $settings['website_name'],
            "short_name"       => $settings['website_name'],
            "start_url"        => env('APP_URL'),
            "display"          => "standalone",
            "theme_color"      => $settings['main_color'] ,
            "background_color" => $settings['main_color'] ,
            "orientation"      => "portrait",
            "icons"            => [
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "36x36",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "48x48",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "60x60",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "72x72",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "76x76",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "96x96",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "120x120",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "152x152",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "180x180",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
                    "sizes" => "192x192",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings['get_website_logo'],
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
