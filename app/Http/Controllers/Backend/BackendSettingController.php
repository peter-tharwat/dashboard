<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
class BackendSettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:settings-update',   ['only' => ['index','update']]);
    }

    public function index()
    {
        if(!auth()->user()->can('settings-update'))abort(403);
        cache()->forget('settings');
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
      
        
        cache()->forget('settings');

        foreach($request->settings as $key => $value ){
            if(!in_array($key,['website_logo','website_wide_logo','website_icon','website_cover'])){
                if(is_array($value))
                    $value = implode(',',$value);
                \App\Models\Setting::updateOrCreate(['key'=>$key],['key'=>$key,'value'=>$value]);
            }
        }
        if($request->hasFile('settings.website_logo')){
            $website_logo_setting= \App\Models\Setting::where('key','website_logo')->first();
            $image = $website_logo_setting->addMedia($request['settings']['website_logo'])->toMediaCollection('website_logo');
            $website_logo_setting->update(['value'=>$image->id.'/'.$image->file_name]);
        }
        if($request->hasFile('settings.website_wide_logo')){
            $website_wide_logo_setting= \App\Models\Setting::where('key','website_wide_logo')->first();
            $image = $website_wide_logo_setting->addMedia($request['settings']['website_wide_logo'])->toMediaCollection('website_wide_logo');
            $website_wide_logo_setting->update(['value'=>$image->id.'/'.$image->file_name]);
        }
        if($request->hasFile('settings.website_icon')){
            $website_icon_setting= \App\Models\Setting::where('key','website_icon')->first();
            $image = $website_icon_setting->addMedia($request['settings']['website_icon'])->toMediaCollection('website_icon');
            $website_icon_setting->update(['value'=>$image->id.'/'.$image->file_name]);
            /*dd(base64_encode( \File::get($request['settings']['website_icon'])  ));
            \App\Models\Setting::where('key','website_icon_base64')->update(['value'=>base64_encode($request['settings']['website_icon'])]);*/

        }
        if($request->hasFile('settings.website_cover')){
            $website_cover_setting= \App\Models\Setting::where('key','website_cover')->first();
            $image = $website_cover_setting->addMedia($request['settings']['website_cover'])->toMediaCollection('website_cover');
            $website_cover_setting->update(['value'=>$image->id.'/'.$image->file_name]);
        }




        /*if($request->hasFile('settings.website_logo')){
            $file = $this->store_file([
                'source'=>$request['settings']['website_logo'],
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE', 
                'user_id'=>\Auth::user()->id,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::where('key','website_logo')->update(['value'=>$file]);
        }
        if($request->hasFile('settings.website_wide_logo')){
            $file = $this->store_file([
                'source'=>$request['settings']['website_wide_logo'],
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE', 
                'user_id'=>\Auth::user()->id,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::where('key','website_wide_logo')->update(['value'=>$file]);
        }
        if($request->hasFile('settings.website_icon')){
            $file = $this->store_file([
                'source'=>$request['settings']['website_icon'],
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE', 
                'user_id'=>\Auth::user()->id,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::where('key','website_icon')->update(['value'=>$file]);
        }
        if($request->hasFile('settings.website_cover')){
            $file = $this->store_file([
                'source'=>$request['settings']['website_cover'],
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER','local'),
                'optimize'=>true
            ])['filename'];
            \App\Models\Setting::where('key','website_cover')->update(['value'=>$file]);
        }*/
        toastr()->success('تم تحديث الإعدادات بنجاح','عملية ناجحة');
        return redirect()->back();

    }

}
