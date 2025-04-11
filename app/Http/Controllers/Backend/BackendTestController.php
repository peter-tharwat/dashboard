<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nafezly\Payments\Classes\YallaPayPayment;

class BackendTestController extends Controller
{
    public function test(Request $request)
    {

        config(['nafezly-payments.VERIFY_ROUTE_NAME'=>"payment-verify"]);

        $payment = new YallaPayPayment();
        $res = $payment->setAmount(500)->pay();
        return $res['redirect_url'];
        dd($res);

        
        dd("TEST");
    }
    public function user(Request $request , \App\Models\User $user){
        dd($user);
    }
}
