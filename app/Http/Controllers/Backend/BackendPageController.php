<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class BackendPageController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:pages-create', ['only' => ['create','store']]);
        $this->middleware('can:pages-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:pages-update',   ['only' => ['edit','update']]);
        $this->middleware('can:pages-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if(!auth()->user()->can('pages-read'))abort(403);
        $pages =  Page::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('pages-create'))abort(403);
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('pages-create'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);
        $request->validate([
            'slug'=>"required|max:190|unique:pages,slug",
            'title'=>"required|max:190",
            'title_en'=>"required|max:190",
            'description'=>"nullable|max:100000",
            'meta_description'=>"nullable|max:10000",
            "removable"=>"required|in:0,1"
        ]);
        $page = Page::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "title"=>$request->title,
            "title_en"=>$request->title_en,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
            "removable"=>$request->removable,
        ]);
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$page,"description");
        if($request->hasFile('image')){
            $image = $page->addMedia($request->image)->toMediaCollection('image');
            $page->update(['image'=>$image->id.'/'.$image->file_name]);
        }

        /*if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/pages/',
                'type'=>'PAGE', 
                'user_id'=>auth()->user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                'optimize'=>true
            ]); 
            $page->update(['image'=>$file['filename']]);
        }*/
        toastr()->success('تم العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        if(!auth()->user()->can('pages-read'))abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if(!auth()->user()->can('pages-update'))abort(403);
        return view('admin.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if(!auth()->user()->can('pages-read'))abort(403);
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);
        $request->validate([
            'slug'=>"required|max:190|unique:pages,slug,".$page->id,
            'title'=>"required|max:190",
            'title_en'=>"required|max:190",
            'description'=>"nullable|max:100000",
            'meta_description'=>"nullable|max:10000",
            "removable"=>"required|in:0,1"
        ]);
        $page->update([
            "slug"=>$request->slug,
            "title"=>$request->title,
            "title_en"=>$request->title_en,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
            "removable"=>$request->removable,
        ]);
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$page,"description");
        if($request->hasFile('image')){
            $image = $page->addMedia($request->image)->toMediaCollection('image');
            $page->update(['image'=>$image->id.'/'.$image->file_name]);
        }
        /*if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/pages/',
                'type'=>'PAGE', 
                'user_id'=>auth()->user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                'optimize'=>true
            ]); 
            $page->update(['image'=>$file['filename']]);
        }*/
        toastr()->success('تم العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page->removable==1){
            $page->delete();
            toastr()->success('تم العملية بنجاح','عملية ناجحة');
        }else{
            flash()->info('عفواً الصفحة غير قابلة للحذف','عملية ناجحة');
        }
        return redirect()->route('admin.pages.index');
    }
}
