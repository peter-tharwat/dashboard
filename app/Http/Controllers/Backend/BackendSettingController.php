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
        $settings = Setting::firstOrCreate();
        return view('admin.settings.index',compact('settings'));
    }

    public function update(Request $request)
    {

        foreach($request->settings as $key => $value ){
            if(!in_array($key,['website_logo','website_wide_logo','website_icon','website_cover']))
                \App\Models\Setting::where('key',$key)->update(['value'=>$value]);
        }

        if($request->hasFile('settings.website_logo')){
            $file = $this->store_file([
                'source'=>$request['settings']['website_logo'],
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE', 
                'user_id'=>\Auth::user()->id,
                //'resize'=>[500,1000],
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
                //'resize'=>[500,1000],
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
                //'resize'=>[500,1000],
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
        }
        toastr()->success('تم تحديث الإعدادات بنجاح','عملية ناجحة');
        return redirect()->back();

    }

}
