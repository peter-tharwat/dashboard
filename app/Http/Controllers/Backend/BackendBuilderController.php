<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendBuilderController extends Controller
{
    public function index(Request $request){
        return view('admin.builders.index');
    }
    public function create(Request $request){

    }
    

}
