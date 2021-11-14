<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        (new \MainHelper)->notify_user([
            'user_id'=>1,
            'message'=>"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.",
            'url'=>env("APP_URL"),
        ]);
    }
    public function user(Request $request , \App\Models\User $user){
        dd($user);
    }
}
