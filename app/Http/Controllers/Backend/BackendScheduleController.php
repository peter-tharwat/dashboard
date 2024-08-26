<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;


class BackendScheduleController extends Controller
{

 
    public function update_traffics_country(){
      $rate_limits = \App\Models\RateLimit::whereNull('country_code')->get();
      foreach($rate_limits as $rate_limit){
        $country=(new \UserSystemInfoHelper)->get_country_from_ip($rate_limit->ip);
        $rate_limit->update([
        'country_code'=>$country['country_code'],
        'country_name'=>$country['country']
        ]);
      }
    }
    public function update_under_attack(){

      //enable under attack
      $ip=\UserSystemInfoHelper::get_ip();
      $total_req_per_minute = \App\Models\RateLimitDetail::where('created_at','>=',\Carbon::parse(now())->subMinutes(2)->format('Y-m-d H:i:s'))->orderBy('id','DESC')->count();

      if($total_req_per_minute>=10000){ 
          $attacks=\App\Models\UnderAttack::where('status','UNDER_ATTACK')->where('release_at','>',\Carbon::parse(now())->format('Y-m-d H:i:s'))->count();
          if($attacks==0){ 
              \App\Models\UnderAttack::create(['status'=>"UNDER_ATTACK",'release_at'=>\Carbon::parse(now())->addMinutes(30)->format('Y-m-d H:i:s')]);
              (new \App\Helpers\SecurityHelper)->enable_under_attack_mode(); 
          }
      }

      //disable under attack
      $under_attacks=\App\Models\UnderAttack::where('status','UNDER_ATTACK')->where('created_at','<',\Carbon::parse(now())->addMinutes(15)->format('Y-m-d H:i:s'))->count();
      if($under_attacks){
        (new \App\Helpers\SecurityHelper)->disable_under_attack_mode(); 
        \App\Models\UnderAttack::where('status','UNDER_ATTACK')->update(['status'=>"MEDIUM"]);
      }
      $blocked_ips = \App\Models\BlockIp::whereDate('created_at','<',\Carbon::parse(now())->subMinutes(30)->format('Y-m-d H:i:s'))->get();
      foreach($blocked_ips as $blocked_ip){
        $response =  (new \App\Helpers\SecurityHelper)->unblock_ip($blocked_ip->state_id);
      }

    }
    public function clean_system(){
        //general users
        $delete_sessions = \App\Models\Session::whereNull('user_id')->delete();

        //loged in users
        $delete_old_sessions = \App\Models\Session::whereNull('user_id')->where('last_activity','<',\Carbon::now()->subDays(30)->valueOf()/1000)->delete();

        //delete rate limits
        $delete_rate_limits = \App\Models\RateLimit::where('created_at','<',\Carbon::parse(now())->subDays(8)->format('Y-m-d H:i:s'))->delete();

        //delete rate limit details
        $delete_rate_limit_details = \App\Models\RateLimitDetail::where('created_at','<',\Carbon::parse(now())->subDays(8)->format('Y-m-d H:i:s'))->delete();

        //delete item seens
        $delete_old_rate_limits = \App\Models\ItemSeen::whereDate('created_at', '<',\Carbon::now()->subDays(1))->delete();

        //old_error_reports
        $delete_old_error_reports = \App\Models\ReportError::whereDate('created_at', '<',\Carbon::now()->subDays(3))->delete();

    }

      

}
