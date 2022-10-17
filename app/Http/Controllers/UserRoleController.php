<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        $user->syncRoles($request->roles);
        $user->syncPermissions(DB::table('permission_role')->whereIn('role_id',$request->roles)->pluck('permission_id'));
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.users.index');
    }
}
