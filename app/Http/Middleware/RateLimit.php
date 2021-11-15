<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
class RateLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $ipAddress = 'NA';
        if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){ 
            $ipAddress = $_SERVER["HTTP_CF_CONNECTING_IP"];
        } else{ 
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } 
        $ip = $request->ip();
        if($ipAddress!='NA'){
            $ip=$ipAddress;
        }



        $last_insert = \App\Models\RateLimit::where('ip',$ip)->where('created_at','<=',\Carbon::parse(now())->addHours(6))->first();
        if($last_insert==null){
            $prev_url="";
            $prev_domain="";
            if(filter_var(url()->previous(), FILTER_VALIDATE_URL)) // is a valid url 
            { 
                $parsex= parse_url(url()->previous());
                $prev_domain=$parsex['host'];  
                $prev_domain="";
                try{
                    $prev_url= url()->previous();
                    $prev_domain=$parse['host'];
                }catch(\Exception $e){

                }   
            }  
            $traffic= \App\Models\RateLimit::create([
                'traffic_landing'=>\Request::fullUrl(),
                'domain'=>$prev_domain,
                'prev_link'=>$prev_url,
                'ip'=>$ip,
                'agent_name'=>$request->header('User-Agent'),
                'user_id'=>auth()->check() ? auth()->user()->id : null ,
                'browser'=>UserSystemInfoHelper::get_browsers(),
                'device'=>UserSystemInfoHelper::get_device(),
                'operating_system'=>UserSystemInfoHelper::get_os()
            ]); 
        }else{
           $last_insert->details()->create([
                'url'=>request()->url(),
                'user_id'=> auth()->check() ? auth()->user()->id : null 
           ]); 
        }
        return $next($request);
    }
}
