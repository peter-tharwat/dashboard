<?php 
namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class SecurityHelper 
{
    public function block_ip($ip,$user_agent=""){ 
        $res = Http::withHeaders([
            'Content-Type'=>'application/json',
            'X-Auth-Email'=>env('CF_EMAIL'),
            'X-Auth-Key'=>env('CF_KEY')
        ])->post('https://api.cloudflare.com/client/v4/user/firewall/access_rules/rules',[
            'paused'=>false,
            'mode' => 'block',
            'configuration' => ['target' => 'ip', 'value' => $ip],
            'notes' => 'Banned on '.date('Y-m-d H:i:s').' by '.env('APP_NAME').' Firewall '.env('APP_ENV')
        ])->json();
        if($res['success']==true){
            $exists=\App\Models\BlockIp::where('status','block')->where(function($q)use($ip){
                $q->where('ip',$ip);
            })->count();
            if($exists==0){
                \App\Models\BlockIp::create(['ip'=>$ip,'state_id'=>$res['result']['id'],'description'=>$user_agent,'status'=>"block" ]);
                return true;
            }  
        }
        return false;
    }
    public function unblock_ip($block_rule_id){
        $res = Http::withHeaders([
            'Content-Type'=>'application/json',
            'X-Auth-Email'=>env('CF_EMAIL'),
            'X-Auth-Key'=>env('CF_KEY')
        ])->delete('https://api.cloudflare.com/client/v4/user/firewall/access_rules/rules/'.$block_rule_id)->json();
        if($res['success']==true){
           return true;
        }
        return false;
    }
    public function enable_under_attack_mode(){

        $res = Http::withHeaders([
            'Content-Type'=>'application/json',
            'X-Auth-Email'=>env('CF_EMAIL'),
            'X-Auth-Key'=>env('CF_KEY')
        ])->patch("https://api.cloudflare.com/client/v4/zones/".env('CF_Z')."/settings/security_level",
            ['value'=>"under_attack"])->json();
        if($res['success']==true){
           return true;
        }
        return false; 
    }
    public function disable_under_attack_mode()
    {
        $res = Http::withHeaders([
            'Content-Type'=>'application/json',
            'X-Auth-Email'=>env('CF_EMAIL'),
            'X-Auth-Key'=>env('CF_KEY')
        ])->patch("https://api.cloudflare.com/client/v4/zones/".env('CF_Z')."/settings/security_level",
            ['value'=>"medium"])->json();
        if($res['success']==true){
           return true;
        }
        return false;  
    }
}