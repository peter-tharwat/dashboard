<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleCommentRequest;
use App\Http\Requests\UpdateArticleCommentRequest;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class BackendArticleCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:comments-create', ['only' => ['create','store']]);
        $this->middleware('can:comments-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:comments-update',   ['only' => ['edit','update','change_status']]);
        $this->middleware('can:comments-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = ArticleComment::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->article_id!=null)
                $q->where('article_id',$request->article_id);
            if($request->q!=null)
                $q->where('content','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate(100);
        return view('admin.comments.index',compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleComment  $article_comment
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleComment $article_comment)
    {
        dd($article_comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleComment  $article_comment
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleComment $article_comment)
    {
        return view('admin.comments.edit',compact('article_comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleCommentRequest  $request
     * @param  \App\Models\ArticleComment  $article_comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleComment $article_comment)
    {
        if($article_comment->user_id)
            $article_comment->update([
                'adder_name'=>$request->adder_name,
                'adder_email'=>$request->adder_email,
            ]);
        $article_comment->update([
            'content'=>$request->content,
            'reviewed'=>$request->reviewed==1?1:0,
        ]);
        toastr()->success(__('utils/toastr.process_success_message'));
        return redirect()->route('admin.article-comments.index',['article_id'=>$article_comment->article_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleComment  $article_comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleComment $article_comment)
    {
        $article_comment->delete();
        toastr()->success(__('utils/toastr.process_success_message'));
        return redirect()->back();
    }
    public function change_status(Request $request){


        if(auth()->user()->hasRole('content-creator')){
            ArticleComment::where('id',$request->id)->whereHas('article',function($q){
                $q->where('user_id',auth()->user()->id);
            })->firstOrFail();
        }

        
        $comment = ArticleComment::where('id',$request->id)->firstOrFail();
        $comment->update(['reviewed'=>!$comment->reviewed]);
        return 1;
    }
}
