<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:announcements-create', ['only' => ['create','store']]);
        $this->middleware('permission:announcements-read',   ['only' => ['show', 'index']]);
        $this->middleware('permission:announcements-update',   ['only' => ['edit','update']]);
        $this->middleware('permission:announcements-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->isAbleTo('announcements-read'))abort(403);

        $announcements=Announcement::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);

            $q->where('title','LIKE','%'.$request->key.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.announcements.index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAbleTo('announcements-create'))abort(403);
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAbleTo('announcements-create'))abort(403);
        $announcement= Announcement::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'url'=>$request->url,
            'open_url_in'=>$request->open_url_in=="NEW_WINDOW"?"NEW_WINDOW":"CURRENT_WINDOW",
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/announcements/',
                'type'=>'ANNOUNCEMENT', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]); 
            $announcement->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.store_success_message'));
        return redirect()->route('admin.announcements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        if(!auth()->user()->isAbleTo('announcements-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        if(!auth()->user()->isAbleTo('announcements-update'))abort(403);
        return view('admin.announcements.edit',compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        if(!auth()->user()->isAbleTo('announcements-update'))abort(403);
        $announcement->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'url'=>$request->url,
            'open_url_in'=>$request->open_url_in=="NEW_WINDOW"?"NEW_WINDOW":"CURRENT_WINDOW",
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/announcements/',
                'type'=>'ANNOUNCEMENT', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]); 
            $announcement->update(['image'=>$file['filename']]);
        }
        toastr()->success(__('utils/toastr.update_success_message'));
        return redirect()->route('admin.announcements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        if(!auth()->user()->isAbleTo('announcements-delete'))abort(403);
        $announcement->delete();
        toastr()->success(__('utils/toastr.destroy_success_message'));
        return redirect()->route('admin.announcements.index');
    }
}
