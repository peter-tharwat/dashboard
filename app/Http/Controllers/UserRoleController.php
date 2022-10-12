<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
class UserRoleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('permission:user-permissions-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-roles-read',   ['only' => ['index']]);
        $this->middleware('permission:user-roles-update',   ['only' => ['update']]);
        //$this->middleware('permission:user-permissions-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request,User $user){
        $roles = Role::get();
        return view('admin.users.roles',compact('roles','user'));
    }
    public function update(Request $request,User $user){
        $user->permissions()->delete();
        $user->syncRoles($request->roles);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.users.index');
    }
}
