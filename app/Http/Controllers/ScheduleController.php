<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;


class ScheduleController extends Controller
{
    public function clean_items_seens(){
      \DB::select('DELETE FROM item_seens where DATE(created_at) < "'.\Carbon::parse(now())->subDays(8)->format('Y-m-d H:i:s').'"');
    }
    public function clean_dashboard_logs(){
      \DB::select('DELETE FROM rate_limits where DATE(created_at) < "'.\Carbon::parse(now())->subDays(8)->format('Y-m-d H:i:s').'"');
      \DB::select('DELETE FROM rate_limit_details where DATE(created_at) < "'.\Carbon::parse(now())->subDays(8)->format('Y-m-d H:i:s').'"');
    }
    /*public function update_traffic(){
        $get_traffics=\App\Models\RateLimit::whereNull('country_code')->whereDate('created_at', \Carbon::today())->get();      
          foreach ($get_traffics as $get_traffic) {
            $g_c=$get=\UserSystemInfoHelper::get_country_from_ip($get_traffic->ip);
            \App\Models\RateLimit::where('id',$get_traffic->id)->update([
              'country_code'=>$g_c['country_code'],
              'country_name'=>$g_c['country']
            ]);
          }
    }*/
     
 
      

}
