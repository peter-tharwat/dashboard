<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;

class UserPermissionController extends Controller
{
    public function __construct()
    {
        //$this->middleware('permission:user-permissions-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-permissions-read',   ['only' => ['index']]);
        $this->middleware('permission:user-permissions-update',   ['only' => ['update']]);
        //$this->middleware('permission:user-permissions-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request,User $user){
        $permissions = Permission::groupBy('table')->get();
        return view('admin.users.permissions',compact('permissions','user'));
    }
    public function update(Request $request,User $user){
        $user->syncPermissions($request->permissions);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->back();
    }
    


}
