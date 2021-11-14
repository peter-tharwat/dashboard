<?php
// This class file to define all general functions
namespace App\Helpers;

class MainHelper {

    protected static $lowerLimit = 70;
    protected static $upperLimit = 255;
    protected static $colorGap = 20;
    protected static $generated = array();
    
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
    
    public static function generate()
    {
        $failCount = 0;
        do {
        $redVector = rand(0, 1);
        $greenVector = rand(0, 1);
        $blueVector = rand(!($redVector || $greenVector), (int)(($redVector xor $greenVector) || !($redVector || $greenVector)));
        $quantiles = floor((self::$upperLimit - self::$lowerLimit) / self::$colorGap);

        $red = $redVector * (rand(0, $quantiles) * self::$colorGap + self::$lowerLimit);
        $green = $greenVector * (rand(0, $quantiles) * self::$colorGap + self::$lowerLimit);
        $blue = $blueVector * (rand(0, $quantiles) * self::$colorGap + self::$lowerLimit);
        $failCount++;
        } while (isset(self::$generated["$red,$green,$blue"]) && $failCount < 1000);

        return self::rgb($red, $green, $blue);
    }
    protected static function rgb($red, $green, $blue)
    {
        $red = base_convert($red, 10, 16);
        $red = str_pad($red, 2, '0', STR_PAD_LEFT);

        $green = base_convert($green, 10, 16);
        $green = str_pad($green, 2, '0', STR_PAD_LEFT);

        $blue = base_convert($blue, 10, 16);
        $blue = str_pad($blue, 2, '0', STR_PAD_LEFT);

        return '#' . $red . $green . $blue;
    }


}