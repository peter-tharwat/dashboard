<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendTestController extends Controller
{
    public function test(Request $request)
    {
        
        \MainHelper::notify_user([
            'user_id'=>1,
            'content'=>["TEST"],
            'btn_text'=>"عرض التنبيه",
            'action_url'=>env("APP_URL"),
        ]); 
    }
    public function user(Request $request , \App\Models\User $user){
        dd($user);
    }
}
