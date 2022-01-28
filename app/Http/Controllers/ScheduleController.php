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
      \DB::raw('DELETE FROM item_seens where DATE(created_at) < "'.\Carbon::parse(now())->subDays(8)->format('Y-m-d H:i:s').'"');
    }
    public function update_traffic(){
        $get_traffics=\App\Models\RateLimit::whereNull('country_code')->whereDate('created_at', \Carbon::today())->get();      
          foreach ($get_traffics as $get_traffic) {
            $g_c=$get=\UserSystemInfoHelper::get_country_from_ip($get_traffic->ip);
            \App\Models\RateLimit::where('id',$get_traffic->id)->update([
              'country_code'=>$g_c['country_code'],
              'country_name'=>$g_c['country']
            ]);
          }
    }
    public function base64ToFile($base64){
        $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));

          // save it to temporary dir first.
          $tmpFilePath = sys_get_temp_dir() . '/' . \Str::uuid()->toString();
          file_put_contents($tmpFilePath, $fileData);

          // this just to help us get file info.
          $tmpFile = new File($tmpFilePath);

          $file = new UploadedFile(
              $tmpFile->getPathname(),
              $tmpFile->getFilename(),
              $tmpFile->getMimeType(),
              0,
              true // Mark it as test, since the file isn't from real HTTP POST.
          );  
    }
 
      

}
