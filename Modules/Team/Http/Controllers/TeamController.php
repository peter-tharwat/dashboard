<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Team\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
       $teams =  Team::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('team::index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('team::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>"required",
            'job_title'=>"required",
        ]);
        $team = Team::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'job_title'=>$request->job_title,
            'facebook_link'=>$request->facebook_link,
            'linkedin_link'=>$request->linkedin_link,
            'whatsapp_link'=>$request->whatsapp_link,
            'twitter_link'=>$request->twitter_link,
            'website_link'=>$request->website_link,
        ]);

        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/teams/',
                'type'=>'TEAM', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]); 
            $team->update(['image'=>$file['filename']]);
        }
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.teams.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Team $team)
    {
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request,Team $team)
    {
        return view('team::edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'title'=>"required",
            'job_title'=>"required",
        ]);
        $team->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'job_title'=>$request->job_title,
            'facebook_link'=>$request->facebook_link,
            'linkedin_link'=>$request->linkedin_link,
            'whatsapp_link'=>$request->whatsapp_link,
            'twitter_link'=>$request->twitter_link,
            'website_link'=>$request->website_link,
        ]);

        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/teams/',
                'type'=>'TEAM', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'optimize'=>true
            ]); 
            $team->update(['image'=>$file['filename']]);
        }
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.teams.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request, Team $team)
    {
        $team->delete();
        toastr()->success("تمت العملية بنجاح");
        return redirect()->route('admin.teams.index');
    }
}
