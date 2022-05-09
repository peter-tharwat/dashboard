<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
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
            /*'watermark'=>true,*/
            'compress'=>'auto'
        ]); 
        return [
            'fileName'=>$file['filename'],
            'uploaded'=>1,
            'success'=>true,
            "hasWarnings"=>false,
            "isSuccess"=>true,
            "warnings"=>[],
            'location'=>env('STORAGE_URL')."/uploads/images/".$file['filename'],
            'file'=>env('STORAGE_URL')."/uploads/images/".$file['filename'],
            'url'=>env('STORAGE_URL')."/uploads/images/".$file['filename'],
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
        $settings = \App\Models\Setting::firstOrFail();
        return response($settings->robots_txt)->header('Content-Type', 'text/plain');
    }
    public function manifest(){ 
        $settings = \App\Models\Setting::firstOrFail();
        $manifest = [
            "name"             => $settings->website_name,
            "short_name"       => $settings->website_name,
            "start_url"        => env('APP_URL'),
            "display"          => "standalone",
            "theme_color"      => $settings->main_color ,
            "background_color" => $settings->main_color ,
            "orientation"      => "portrait",
            "icons"            => [
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "36x36",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "48x48",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "60x60",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "72x72",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "76x76",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "96x96",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "120x120",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "152x152",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "180x180",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
                    "sizes" => "192x192",
                    "type"  => "image/png",
                ],
                [
                    "src"   => $settings->website_logo(),
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
