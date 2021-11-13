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

    
}
