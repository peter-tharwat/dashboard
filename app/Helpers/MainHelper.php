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
    
    public function make_error_report(
        $options=[]
    ){
        $options = array_merge([
            'error'=>"",
            'error_code'=>"",
            'details'=>json_encode(request()->instance())
        ],$options);
        \App\Models\ReportError::create([
            'user_id'=>(auth()->check()?auth()->user()->id:null),
            'title'=>$options['error'],
            'code'=>$options['error_code'],
            'url'=>url()->previous(),
            'ip'=>\UserSystemInfoHelper::get_ip(),
            'user_agent'=>request()->header('User-Agent'),
            'request'=>json_encode(request()->all()),
            'description'=>$options['details']
        ]);
    }
    public static function binaryToString($binary)
    {
        $binaries = explode(' ', $binary);
     
        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }
     
        return $string;    
    }

    public static function focus_urls($string)
    {
         $url_regex = '~(http|ftp)s?://[a-z0-9.-]+\.[a-z]{2,7}(/\S*)?~i';
         return preg_replace($url_regex, " <a href='$0' target='_blank' rel='nofollow' style='font-family: inherit;'>$0</a> ",urldecode(htmlspecialchars($string)));
    }
    
    public static function slug($string){
        $t = $string; 
        $specChars = array(
            ' ' => '-',    '!' => '',    '"' => '',
            '#' => '',    '$' => '',    '%' => '',
            '&amp;' => '','&nbsp;' => '', 
            '\'' => '',   '(' => '',
            ')' => '',    '*' => '',    '+' => '',
            ',' => '',    '₹' => '',    '.' => '',
            '/-' => '',    ':' => '',    ';' => '',
            '<' => '',    '=' => '',    '>' => '',
            '?' => '',    '@' => '',    '[' => '',
            '\\' => '',   ']' => '',    '^' => '',
            '_' => '',    '`' => '',    '{' => '',
            '|' => '',    '}' => '',    '~' => '',
            '-----' => '-',    '----' => '-',    '---' => '-',
            '/' => '',    '--' => '-',   '/_' => '-',    
        ); 
        foreach ($specChars as $k => $v) {
            $t = str_replace($k, $v, $t);
        }
 
        return substr($t,0,230);
    }
    



}