<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
       $data=[];
       if(auth()->user()->power=="ADMIN")
            $data= $this->admin_attributes($request);

       return view('admin.index',compact('data'));

    }
    public function admin_attributes(Request $request){
        return [
            "path"=>app('rinvex.statistics.path')->orderBy('count','DESC')->get(),
            "geoip"=>app('rinvex.statistics.geoip')->orderBy('count','DESC')->get(),
            "route"=>app('rinvex.statistics.route')->orderBy('count','DESC')->get(),
            "agent"=>app('rinvex.statistics.agent')->orderBy('count','DESC')->get(),
            "device"=>app('rinvex.statistics.device')->orderBy('count','DESC')->get(),
            "request"=>app('rinvex.statistics.request')->get(),
            "platform"=>app('rinvex.statistics.platform')->orderBy('count','DESC')->get()
       ];
    }

       
}
