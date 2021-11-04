<?php
// This class file to define all general functions
namespace App\Helpers;

class MainHelper {


    public function notify_user(
        $options=[]
    ){
        $options = array_merge([
            'user_id'=>1,
            'message'=>"",
            'url'=>"",
            'methods'=>['database'],
            'image'=>"",
            'btn_text'=>"عرض الإشعار"
        ],$options);
        $user = \App\Models\User::where('id',$options['user_id'])->first();
        if($user!=null){
            \App\Models\User::where('email', $user->email )->first()->notify(
                new \App\Notifications\GeneralNotification([
                    'content'=>[$options['message']],
                    'url'=>$options['url'],
                    'btn_text'=>$options['btn_text'],
                    'methods'=>$options['methods'],
                    'image'=>$options['image']
                ])
            );
        }
    }

}