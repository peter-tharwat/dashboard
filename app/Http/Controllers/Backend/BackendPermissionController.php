<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class BackendPermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:permissions-create', ['only' => ['create','store']]);
        $this->middleware('can:permissions-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:permissions-update',   ['only' => ['edit','update']]);
        $this->middleware('can:permissions-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->can('permissions-read'))abort(403);
        $permissions =  Page::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('display_name','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('permissions-create'))abort(403);
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('permissions-create'))abort(403);
        Permission::create([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description,
            'table'=>$request->table,
        ]);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        if(!auth()->user()->can('permissions-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Permission $permission)
    {
        if(!auth()->user()->can('permissions-update'))abort(403);
        return view('admin.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permission)
    {
        if(!auth()->user()->can('permissions-update'))abort(403);
        $permission->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
            'description'=>$request->description,
            'table'=>$request->table,
        ]);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('permissions-delete'))abort(403);
        toastr()->success("تمت العملية بنجاح");
        return redirect()->back();
    }
}
