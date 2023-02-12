<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\DB;

class BackendPluginController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:articles-create', ['only' => ['create','store']]);
        $this->middleware('can:articles-read',   ['only' => ['index']]);
        $this->middleware('can:articles-update',   ['only' => ['activate','deactivate']]);
        $this->middleware('can:articles-delete',   ['only' => ['delete']]);
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
            $permission_ids[] = \Spatie\Permission\Models\Permission::firstOrCreate([
                'name' => $module . '-' . $permission,
                'table'=>$module
            ])->id;


        $users = \App\Models\User::whereHas('roles',function($q){$q->where('name','superadmin');})->get();
        $role = \Spatie\Permission\Models\Role::where('name','superadmin')->first()->givePermissionTo($permission_ids);

        foreach($users as $user){
            $user->syncPermissions($permission_ids);
        }

        \Artisan::call('module:migrate '.$plugin->getName(),['--force' => true]);
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
            \Spatie\Permission\Models\Permission::where('name',$module . '-' . $permission)->delete();
        }
        

        \Artisan::call('module:migrate-reset '.$plugin->getName(),['--force' => true]);
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
