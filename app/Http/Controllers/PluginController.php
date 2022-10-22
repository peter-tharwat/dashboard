<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\DB;

class PluginController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:articles-create', ['only' => ['create','store']]);
        $this->middleware('permission:articles-read',   ['only' => ['index']]);
        $this->middleware('permission:articles-update',   ['only' => ['activate','deactivate']]);
        $this->middleware('permission:articles-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        return view('admin.plugins.index');
    }
    public function create(Request $request)
    {
        return view('admin.plugins.create');
    }
    public function store(Request $request)
    {
        $zip = new \ZipArchive;
        $res = $zip->open($request->file);
        if ($res === TRUE) {
          $zip->extractTo(Module::getPath());
          $zip->close();
          toastr()->success("تمت عملية رفع الاضافة بنجاح");
          return redirect()->route('admin.plugins.index');
        } else {
          toastr()->error("عفواً برجاء رفع الاضافة بشكل سليم");
          return redirect()->route('admin.plugins.index');
        }
    }
    public function activate($plugin)
    {

        Module::findorFail($plugin)->enable();
        $plugin = Module::findorFail($plugin);
        $module = $plugin->get('route');

        $permissions = ['create','read','update','delete'];
        foreach($permissions as $permission)
            $permission_ids[] = \App\Models\Permission::firstOrCreate([
                'name' => $module . '-' . $permission,
                'display_name' => ucfirst($permission) . ' ' . ucfirst($module),
                'description' => ucfirst($permission) . ' ' . ucfirst($module),
                'table'=>$module
            ])->id;


        $users = \App\Models\User::whereHas('roles',function($q){$q->where('name','superadmin');})->get();
        $role = \App\Models\Role::where('name','superadmin')->first()->attachPermissions($permission_ids);

        foreach($users as $user){
            $user->syncPermissionsWithoutDetaching($permission_ids);
        }

        \Artisan::call('module:migrate '.$plugin->getName());
        toastr()->success("تمت عملية تفعيل الاضافة بنجاح");
        return redirect()->route('admin.plugins.index');
    }
    public function deactivate($plugin)
    {
        Module::findorFail($plugin)->disable();
        $plugin = Module::findorFail($plugin);
        $module = $plugin->get('route');


        $permissions = ['create','read','update','delete'];

        foreach($permissions as $permission){
            \App\Models\Permission::where('name',$module . '-' . $permission)->delete();
        }
        

        \Artisan::call('module:migrate-reset '.$plugin->getName());
        toastr()->success("تمت عملية تعطيل الاضافة بنجاح");
        return redirect()->route('admin.plugins.index');
    }
    public function delete($plugin)
    {
        Module::findorFail($plugin)->delete();
        toastr()->success("تمت عملية حذف الاضافة بنجاح");
        return redirect()->route('admin.plugins.index');
    }

    
}
