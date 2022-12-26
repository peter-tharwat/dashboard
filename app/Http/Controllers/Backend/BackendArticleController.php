<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BackendArticleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('can:articles-create', ['only' => ['create','store']]);
        $this->middleware('can:articles-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:articles-update',   ['only' => ['edit','update']]);
        $this->middleware('can:articles-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        $articles =  Article::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        $categories= Category::orderBy('id','DESC')->get();
        return view('admin.articles.create',compact('categories','tags'));
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
            'slug'=>"required|max:190|unique:articles,slug",
            'category_id'=>"required|array",
            'category_id.*'=>"required|exists:categories,id",
            'is_featured'=>"required|in:0,1",
            'title'=>"required|max:190",
            'description'=>"nullable|max:100000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $article = Article::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "is_featured"=>$request->is_featured==1?1:0,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        $article->categories()->sync($request->category_id);
        $article->tags()->sync($request->tag_id);
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$article,"description");
        if($request->hasFile('main_image')){
            $main_image = $article->addMedia($request->main_image)->toMediaCollection('image');
            $article->update(['main_image'=>$main_image->id.'/'.$main_image->file_name]);
        }
        toastr()->success(__('utils/toastr.article_store_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::get();
        $categories= Category::orderBy('id','DESC')->get();
        return view('admin.articles.edit',compact('article','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:articles,slug,".$article->id,
            'category_id'=>"required|array",
            'category_id.*'=>"required|exists:categories,id",
            'is_featured'=>"required|in:0,1",
            'title'=>"required|max:190",
            'description'=>"nullable|max:100000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $article->update([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "is_featured"=>$request->is_featured==1?1:0,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        $article->categories()->sync($request->category_id);
        $article->tags()->sync($request->tag_id);
        \MainHelper::move_media_to_model_by_id($request->temp_file_selector,$article,"description");
        if($request->hasFile('main_image')){
            $main_image = $article->addMedia($request->main_image)->toMediaCollection('image');
            $article->update(['main_image'=>$main_image->id.'/'.$main_image->file_name]);
        }
        toastr()->success(__('utils/toastr.article_update_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        toastr()->success(__('utils/toastr.article_destroy_success_message'), __('utils/toastr.successful_process_message'));
        return redirect()->route('admin.articles.index');
    }
}
