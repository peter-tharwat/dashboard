<?php

namespace App\Http\Controllers;

use App\Models\HubFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:hub-files-create', ['only' => ['create','store']]);
        $this->middleware('permission:hub-files-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:hub-files-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:hub-files-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('hub-files-read'))abort(403);
        $files = HubFile::where(function($q)use($request){

            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->user_id!=null)
                $q->where('user_id',$request->user_id);
            
        })->orderBy('id','DESC')->paginate();
        return view('admin.files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('hub-files-create'))abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('hub-files-create'))abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function show(HubFile $hubFile)
    {
        if(!auth()->user()->isAbleTo('hub-files-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function edit(HubFile $hubFile)
    {
        if(!auth()->user()->isAbleTo('hub-files-update'))abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HubFile $hubFile)
    {
        if(!auth()->user()->isAbleTo('hub-files-update'))abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HubFile  $hubFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(HubFile $file)
    {
        if(!auth()->user()->isAbleTo('hub-files-delete'))abort(403);
        $file->forceDelete();
        //you have to remove it if you want
        toastr()->success(__('utils/toastr.process_success_message'));
        return redirect()->back();
    }
}
