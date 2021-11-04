<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
    	return view('admin.index');
    }
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
    public function seen_notifications(Request $request){
        auth()->user()->unreadNotifications->markAsRead();
    }
}
