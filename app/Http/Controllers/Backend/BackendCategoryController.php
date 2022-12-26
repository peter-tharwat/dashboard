<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BackendCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:categories-create', ['only' => ['create','store']]);
        $this->middleware('can:categories-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:categories-update',   ['only' => ['edit','update']]);
        $this->middleware('can:categories-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories =  Category::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->withCount(['articles'])->orderBy('id','DESC')->paginate();

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'slug'=>"required|max:190|unique:categories,slug",
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $category = Category::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $image = $category->addMedia($request->image)->toMediaCollection('image');
            $category->update(['image'=>$image->id.'/'.$image->file_name]);
        }
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$category,"description");
        toastr()->success(__('utils/toastr.category_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:categories,slug,".$category->id,
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $category->update([
            "slug"=>$request->slug,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $image = $category->addMedia($request->image)->toMediaCollection('image');
            $category->update(['image'=>$image->id.'/'.$image->file_name]);
        }
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$category,"description");
        toastr()->success(__('utils/toastr.category_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->success(__('utils/toastr.category_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.categories.index');
    }
}
