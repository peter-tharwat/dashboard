<?php
namespace App\Helpers;
use App\Models\MenuLink;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;

class MainHelper {

    protected static $lowerLimit = 70;
    protected static $upperLimit = 255;
    protected static $colorGap = 20;
    protected static $generated = array();
    
    public static function notify_user(
        $options=[]
    ){
        $options = array_merge([
            'user_id'=>1,
            'content'=>[],
            'action_url'=>"",
            'methods'=>['database'],
            'image'=>"",
            'btn_text'=>"عرض الإشعار"
        ],$options);
        $user = \App\Models\User::where('id',$options['user_id'])->first();
        if($user!=null){
            \App\Models\User::where('email', $user->email)->first()->notify(
                (new \App\Notifications\GeneralNotification())
                ->setContent($options['content'])
                ->setMethods($options['methods'])
                ->setActionUrl($options['action_url'])
                ->setActionText($options['btn_text'])
                ->setActionText($options['image'])
            );
        }
    }
    public static function recaptcha($cap){
        
         $ipAddress = 'NA';
        if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){ 
            $ipAddress = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else{ 
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } 

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        //$remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
                'secret' => env("RECAPTCHA_SECRET_KEY"),
                'response' => $cap,
                'remoteip' => $ipAddress
              ];
        $options = [
                'http' => [
                  'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                  'method' => 'POST',
                  'content' => http_build_query($data)
                ]
            ];
        $context = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                $resultJson = json_decode($result);

        if ($resultJson->success != true) {
            return 0; 
        }else{
         return json_decode(json_encode($resultJson),true)['score']; 
        } 

    }

    public static function notify_visitors(
        $options=[]
    ){
        $options = array_merge([
            'emails'=>["admin@admin.com"],
            'content'=>[],
            'action_url'=>"",
            'methods'=>['mail'],
            'image'=>"",
            'btn_text'=>"عرض الإشعار"
        ],$options);
         Notification::route('mail', $options['emails'])
                ->notify((new \App\Notifications\GeneralNotification())
                    ->setContent($options['content'])
                ->setMethods($options['methods'])
                ->setActionUrl($options['action_url'])
                ->setActionText($options['btn_text'])
                ->setActionText($options['image']));
    }
    
    public static function make_error_report(
        $options=[]
    ){
        $options = array_merge([
            'error'=>"",
            'error_code'=>"",
            'details'=>json_encode(request()->instance())
        ],$options);
        try{
            if(Schema::hasTable('report_errors'))
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
        }catch(\Exception $e){}
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
    /*/src=[\"\'][^\'\']+[\"\']/*/

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
    public static function menuLinkGenerator(MenuLink $link){
        if($link->type=="CUSTOM_LINK"){
            return $link->url;
        }elseif($link->type=="PAGE"){
            $page = \App\Models\Page::where('id',$link->type_id)->first();
            if($page == null)
                return env("APP_URL");
            return route('page.show',$page);
        }elseif($link->type=="CATEGORY"){
            $category = \App\Models\Category::where('id',$link->type_id)->first();
            if($category == null)
                return env("APP_URL");
            return route('category.show',$category);
        }
    }

    public static function get_conversion($file_name,$conversion="original",$new_extension="webp"){
        if($new_extension=="main" || $conversion ==null)
            $new_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $explode = explode("/",$file_name);
        if(isset($explode[0]) && isset($explode[1]) && $conversion!=null){
            $new_file_name =pathinfo($file_name, PATHINFO_FILENAME).'-'.$conversion.'.'.$new_extension;
            return $explode[0] .'/'."conversions".'/'.$new_file_name;
        }
        return $file_name;
    }
    public static function move_media_to_model_by_id($id,$model,$collection="default"){
        $temp_files = \App\Models\TempFile::where('name',$id)->with(['media'])->get();
        foreach($temp_files as $file){
            foreach($file->media as $media){
                $media->move($model,$collection);
            }
        }
        return 1;
    }


    



}