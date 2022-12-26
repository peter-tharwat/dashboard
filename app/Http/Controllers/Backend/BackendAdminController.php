<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendAdminController extends Controller
{
    public function index(Request $request)
    {
       return view('admin.index');
    }
       
}
