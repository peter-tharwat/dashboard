<?php

namespace App\Http\Controllers\Backend;

use App\Models\Plugin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;

class BackendPluginController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:plugins-create', ['only' => ['create','website']]);
        $this->middleware('can:plugins-read',   ['only' => ['show', 'index','push']]);
        $this->middleware('can:plugins-update',   ['only' => ['edit','update','builder_edit','builder_update']]);
        $this->middleware('can:plugins-delete',   ['only' => ['delete']]);
        cache()->forget('plugins');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $groupedPlugins = collect(config()->get('plugins'))->groupBy('category');
        $plugins = Plugin::get(); 
        $plugins_array = $plugins->pluck('slug')->toArray();
        return view('admin.plugins.index',compact('groupedPlugins','plugins','plugins_array'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plugin = collect(config()->get('plugins'))->where('slug',$request->slug)->first(); 
        $inital_values = $plugin['initial_values']??[];
        Plugin::firstOrCreate([
            'slug'=>$request->slug,
            'activated'=>1,
        ],$inital_values);

        flash()->addSuccess("تم تفعيل الاضافة بنجاح");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,Plugin $plugin)
    {
        return view('admin.plugins.views.'.$plugin->slug,['plugin'=>$plugin])->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plugin $plugin)
    {
       
        $plugin->update([
            'activated'=>$request->activated==1?1:0,
            'header_code'=>$request->header_code,
            'footer_code'=>$request->footer_code,
            'settings'=>$request->settings
        ]);

        flash()->addSuccess("تم تعديل الاضافة بنجاح");
        return redirect()->back();
    }


/*    public function push(Request $request, Plugin $plugin)
    {
        $website = $website->load(['plugins']);
        if($plugin->slug == "self_whatsapp_connect" || $plugin->slug == "self_whatsapp_connect2"){
            \MainHelper::logout_internal_whatsapp($plugin->id);
            flash()->addSuccess("تمت العملية بنجاح");
            return redirect()->back();
        }elseif($plugin->slug == "whatsapp_campaign"){

            $phones = explode("\n", $request->phones);
            $v1s = explode("\n", $request->v1);
            $v2s = explode("\n", $request->v2);
            $v3s = explode("\n", $request->v3);

            $contents = [];

            for($i=0; $i< count($phones); $i++){
                if(isset($v1s[$i]))
                    $message = str_replace('V1', $v1s[$i], $request->message);
                
                if(isset($v2s[$i]))
                    $message = str_replace('V2', $v2s[$i], $message);

                if(isset($v3s[$i]))
                    $message = str_replace('V3', $v3s[$i], $message);


                $contents[]=[
                    'phone'=>trim($request->country_code.$phones[$i]),
                    'message'=> $message,
                ];
            }


            foreach($contents as $content)
            $notification = Notification::route('internal_whatsapp',$content['phone'])
                ->notify(
                    (new GeneralNotification())
                    ->setPhone($content['phone'])
                    ->setContent([$content['message']])
                    ->setWebsite($website)
                    ->setTargetPluginFilter('use_for_campaign_messages')
                    ->setMethods(['internal_whatsapp'])
                );
                

            flash()->addSuccess("تمت العملية بنجاح");
            return redirect()->back();
        }elseif($plugin->slug == "email_campaign"){

            $emails = explode("\n", $request->emails);
            $v1s = explode("\n", $request->v1);
            $v2s = explode("\n", $request->v2);
            $v3s = explode("\n", $request->v3);

            $contents = [];

            for($i=0; $i< count($emails); $i++){
                if(isset($v1s[$i])){
                    $title = str_replace('V1', $v1s[$i], $request->title);
                    $message = str_replace('V1', $v1s[$i], $request->message);
                }
                
                if(isset($v2s[$i])){
                    $title = str_replace('V2', $v2s[$i], $title);
                    $message = str_replace('V2', $v2s[$i], $message);
                }

                if(isset($v3s[$i])){
                    $title = str_replace('V3', $v3s[$i], $title);
                    $message = str_replace('V3', $v3s[$i], $message);
                }


                $contents[]=[
                    'email'=>trim($emails[$i]),
                    'title'=>$title,
                    'message'=> $message,
                ];
            }


            foreach($contents as $content)
            $notification = Notification::route('mail', $content['email'])
                ->notify(
                    (new GeneralNotification())
                    ->setSubject($title)
                    ->setContent([$content['message']])
                    ->setWebsite($website)
                    ->setActionUrl($request->btn_url)
                    ->setActionText($request->btn_text)
                    ->setMethods(['mail'])
                );



            flash()->addSuccess("تمت العملية بنجاح");
            return redirect()->back();
        }

    }*/

    public function builder_edit(Request $request,Plugin $plugin){


        if($plugin->settings!=null &&  !array_key_exists($request->input_parameter, $plugin->settings) )abort(404);

        $redirect_url = route('admin.plugins.index');
        $update_url = route('admin.plugins.builder-update',['plugin'=>$plugin]);
        $page = [
            'title'=>$plugin->slug,
            'slug'=>$plugin->slug,
            'content'=>$plugin->settings[$request->input_parameter]??""
        ];
        return view('admin.builders.index',compact('redirect_url','update_url','page'));
    }
    
    public function builder_update(Request $request,Plugin $plugin){
        

        if($plugin->settings!=null && !array_key_exists($request->input_parameter, $plugin->settings) )abort(404);

        $result = json_encode(json_decode($request->contents,true)) == "[]" ? "" : json_encode(json_decode($request->contents,true));
        $plugin->update([
            'settings->'.$request->input_parameter => $result
        ]);

        return [
            'redirect_url'=>route('admin.plugins.index')
        ];
    }




}
