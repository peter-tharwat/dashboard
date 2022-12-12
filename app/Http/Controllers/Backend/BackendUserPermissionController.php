<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class BackendUserPermissionController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:user-permissions-create', ['only' => ['create','store']]);
        $this->middleware('can:user-permissions-read',   ['only' => ['index']]);
        $this->middleware('can:user-permissions-update',   ['only' => ['update']]);
        //$this->middleware('can:user-permissions-delete',   ['only' => ['delete']]);
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
