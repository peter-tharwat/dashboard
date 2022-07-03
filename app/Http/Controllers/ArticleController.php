<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    

    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article'); 
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
        $categories= Category::orderBy('id','DESC')->get();
        return view('admin.articles.create',compact('categories'));
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

        if($request->hasFile('main_image')){
            $file = $this->store_file([
                'source'=>$request->main_image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/articles/',
                'type'=>'ARTICLE', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]); 
            $article->update(['main_image'=>$file['filename']]);
        }
        toastr()->success('تم إضافة المقال بنجاح','عملية ناجحة');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories= Category::orderBy('id','DESC')->get();
        return view('admin.articles.edit',compact('article','categories'));
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
        if($request->hasFile('main_image')){
            $file = $this->store_file([
                'source'=>$request->main_image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/articles/',
                'type'=>'ARTICLE', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]); 
            $article->update(['main_image'=>$file['filename']]);
        }
        toastr()->success('تم تحديث المقال بنجاح','عملية ناجحة');
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
        toastr()->success('تم حذف المقال بنجاح','عملية ناجحة');
        return redirect()->route('admin.articles.index');
    }
}
