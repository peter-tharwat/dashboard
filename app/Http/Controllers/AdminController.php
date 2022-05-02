<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
       if(auth()->user()->power=="USER")
         return redirect()->route('admin.profile.index');
       return view('admin.index');
    }
    

       
}
