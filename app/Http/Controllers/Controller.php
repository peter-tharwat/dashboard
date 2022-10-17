<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function store_file($options=[])
    {   
        $options = array_merge([
            //'source'=>"",
            'validation'=>"file",
            'path_to_save'=>'/uploads/files/',
            'type'=>'',
            'type_id'=>"",
            'user_id'=>NULL,
            'resize'=>[400,15000],
            'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER','s3'),
            'optimize'=>false,
            'new_extension'=>"",
            'used_at'=>NULL,
        ],$options);
        return \App\Helpers\UploadFilesHelper::store_file($options);
 
    }
    public function remove_hub_file($name)
    {
        return \App\Helpers\UploadFilesHelper::remove_hub_file($name);
    }
    public function use_hub_file($name, $type_id, $user_id = null, $is_main = 0)
    {
        return \App\Helpers\UploadFilesHelper::use_hub_file($name, $type_id, $user_id , $is_main);
    }
}