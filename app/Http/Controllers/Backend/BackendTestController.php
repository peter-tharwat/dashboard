<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendTestController extends Controller
{
    public function index(Request $request)
    {
        (new \MainHelper)->notify_user([
            'user_id'=>$request->user_id,
            'content'=>[$request->content],
            'btn_text'=>"عرض التنبيه",
            'action_url'=>env("APP_URL"),
        ]);
    }
    public function user(Request $request , \App\Models\User $user){
        dd($user);
    }
}
