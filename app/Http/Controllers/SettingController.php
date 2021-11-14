<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::firstOrCreate();
        return view('admin.settings.index',compact('settings'));
    }

    public function update(Request $request)
    {

        dd($request->all());
    }

}
