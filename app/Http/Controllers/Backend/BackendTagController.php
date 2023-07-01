<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class BackendTagController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:tags-create', ['only' => ['create','store']]);
        $this->middleware('can:tags-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:tags-update',   ['only' => ['edit','update']]);
        $this->middleware('can:tags-delete',   ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        $tags = Tag::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('tag_name','LIKE','%'.$request->q.'%')
                    ->orWhere('arabic_name','LIKE','%'.$request->q.'%')
                    ->orWhere('english_name','LIKE','%'.$request->q.'%')
                    ->orWhere('slug','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate(100);
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag_name'=>"required|unique:tags,tag_name",
            'slug'=>"required|unique:tags,tag_name"
        ]);
        Tag::create([
            'tag_name'=>$request->tag_name,
            'arabic_name'=>$request->arabic_name,
            'english_name'=>$request->english_name,
            'slug'=>strtolower(str_replace(' ','-',$request->slug))
        ]);
        toastr()->success('تمت العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $request->validate([
            'tag_name'=>"required|unique:tags,tag_name,".$tag->id,
            'slug'=>"required|unique:tags,tag_name,".$tag->id,
        ]);
        $tag->update([
            'tag_name'=>$request->tag_name,
            'arabic_name'=>$request->arabic_name,
            'english_name'=>$request->english_name,
            'slug'=>strtolower(str_replace(' ','-',$request->slug))
        ]);
        toastr()->success('تمت العملية بنجاح','عملية ناجحة');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        toastr()->success('تمت العملية بنجاح');
        return redirect()->back();;
    }
}
