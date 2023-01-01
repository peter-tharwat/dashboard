<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class BackendAnnouncementController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:announcements-create', ['only' => ['create','store']]);
        $this->middleware('can:announcements-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:announcements-update',   ['only' => ['edit','update']]);
        $this->middleware('can:announcements-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
        $announcement= Announcement::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'url'=>$request->url,
            'location'=>$request->location,
            'open_url_in'=>$request->open_url_in=="NEW_WINDOW"?"NEW_WINDOW":"CURRENT_WINDOW",
        ]);

        if($request->hasFile('image')){
            $image = $announcement->addMedia($request->image)->toMediaCollection('image');
            $announcement->update(['image'=>$image->id.'/'.$image->file_name]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
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
        $announcement->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'url'=>$request->url,
            'location'=>$request->location,
            'open_url_in'=>$request->open_url_in=="NEW_WINDOW"?"NEW_WINDOW":"CURRENT_WINDOW",
        ]);
        if($request->hasFile('image')){
            $image = $announcement->addMedia($request->image)->toMediaCollection('image');
            $announcement->update(['image'=>$image->id.'/'.$image->file_name]);
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
        $announcement->delete();
        toastr()->success(__('utils/toastr.destroy_success_message'));
        return redirect()->route('admin.announcements.index');
    }
}
