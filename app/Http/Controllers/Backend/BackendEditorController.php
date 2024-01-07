<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use Illuminate\Http\Request;

class BackendEditorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:editors-create', ['only' => ['create','store']]);
        $this->middleware('can:editors-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:editors-update',   ['only' => ['edit','update']]);
        $this->middleware('can:editors-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $editors =  Editor::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->withCount(['articles'])->orderBy('id','DESC')->paginate();

        return view('admin.editors.index',compact('editors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.editors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:editors,slug",
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $editor = Editor::create([
            "slug"=>$request->slug,
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $image = $editor->addMedia($request->image)->toMediaCollection('image');
            $editor->update(['image'=>$image->id.'/'.$image->file_name]);
        }
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$editor,"description");
        toastr()->success(__('utils/toastr.editor_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.editors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function show(Editor $editor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function edit(Editor $editor)
    {   
        return view('admin.editors.edit',compact('editor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editor $editor)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:editors,slug,".$editor->id,
            'name'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $editor->update([
            "slug"=>$request->slug,
            "name"=>$request->name,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('avatar')){
            $image = $editor->addMedia($request->image)->toMediaCollection('avatar');
            $editor->update(['avatar'=>$image->id.'/'.$image->file_name]);
        }
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$editor,"description");
        toastr()->success(__('utils/toastr.editor_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.editors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editor  $editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editor $editor)
    {
        $editor->delete();
        toastr()->success(__('utils/toastr.editor_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.editors.index');
    }
}
