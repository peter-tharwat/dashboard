<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class BackendUserRoleController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:user-permissions-create', ['only' => ['create','store']]);
        $this->middleware('can:user-roles-read',   ['only' => ['index']]);
        $this->middleware('can:user-roles-update',   ['only' => ['update']]);
        //$this->middleware('can:user-permissions-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request,User $user){
        $roles = Role::get();
        return view('admin.users.roles',compact('roles','user'));
    }
    public function update(Request $request,User $user){
        $user->syncRoles($request->roles);

        //$user->syncPermissions(DB::table('model_has_permissions')->whereIn('role_id',$request->roles)->pluck('permission_id'));
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.users.index');
    }
}
