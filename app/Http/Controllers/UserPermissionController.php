<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;

class UserPermissionController extends Controller
{
    public function index(Request $request,User $user){
        if(!auth()->user()->isAbleTo('user-permissions-update'))abort(403);
        $permissions = Permission::get();
        return view('admin.users.permissions',compact('permissions','user'));
    }
    public function update(Request $request,User $user){
        if(!auth()->user()->isAbleTo('user-permissions-update'))abort(403);
        $user->syncPermissions($request->permissions);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->back();
    }
    


}
