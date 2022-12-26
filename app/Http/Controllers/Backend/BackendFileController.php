<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class BackendFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:hub-files-create', ['only' => ['create','store']]);
        $this->middleware('can:hub-files-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:hub-files-update',   ['only' => ['edit','update']]);
        $this->middleware('can:hub-files-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        $files = Media::where(function($q)use($request){

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
        if(!auth()->user()->can('hub-files-create'))abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('hub-files-create'))abort(403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        if(!auth()->user()->can('hub-files-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        if(!auth()->user()->can('hub-files-update'))abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        if(!auth()->user()->can('hub-files-update'))abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $file)
    {
        if(!auth()->user()->can('hub-files-delete'))abort(403);
        $file->forceDelete();
        //you have to remove it if you want
        toastr()->success(__('utils/toastr.process_success_message'));
        return redirect()->back();
    }
}
