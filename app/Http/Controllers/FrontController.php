<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Contact;
use App\Models\ArticleComment;
use App\Models\Page;
use App\Models\Category;


class FrontController extends Controller
{
    
    public function index(Request $request)
    {
        return view('front.index');
    }
    
    public function comment_post(Request $request)
    {
        if(auth()->check()){
            $request->validate([
                "content"=>"required|min:3|max:10000",
            ]);
            ArticleComment::create([
                'user_id'=>auth()->user()->id,
                'article_id'=>$request->article_id,
                'content'=>$request->content,
            ]);
        }else{
            $request->validate([
                'adder_name'=>"nullable|min:3|max:190",
                'adder_email'=>"nullable|email",
                "content"=>"required|min:3|max:10000",
            ]);
            ArticleComment::create([
                'article_id'=>$request->article_id,
                'adder_name'=>$request->adder_name,
                'adder_email'=>$request->adder_email,
                'content'=>$request->content,
            ]);
        }
        toastr()->success("تم اضافة تعليقك بنجاح وسيظهر للعامة بعد المراجعة");
        return redirect()->back();
    }

    public function contact_post(Request $request)
    {
        $request->validate([
            'name'=>"required|min:3|max:190",
            'email'=>"nullable|email",
            "phone"=>"required|numeric",
            "message"=>"required|min:3|max:10000",
        ]);
        if(\MainHelper::recaptcha($request->recaptcha)<0.8)abort(401);
        Contact::create([
            'user_id'=>auth()->check()?auth()->id():NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>/*"قادم من : ".urldecode(url()->previous())."\n\nالرسالة : ".*/$request->message
        ]);

        toastr()->success('تم استلام رسالتك بنجاح وسنتواصل معك في أقرب وقت');
        //\Session::flash('message', __("Your Message Has Been Send Successfully And We Will Contact You Soon !"));
        return redirect()->back();
    }
    public function category(Request $request,Category $category){
        $articles = Article::where(function($q)use($request,$category){
            if($request->user_id!=null)
                $q->where('user_id',$request->user_id);
            
            $q->whereHas('categories',function($q)use($request,$category){
                $q->where('category_id',$category->id);
            });
        })->with(['categories','tags'])->withCount(['comments'=>function($q){$q->where('reviewed',1);}])->orderBy('id','DESC')->paginate();
        return view('front.pages.blog',compact('articles','category'));
    }
    public function tag(Request $request,Tag $tag){

        $articles = Article::where(function($q)use($request,$tag){
            if($request->user_id!=null)
                $q->where('user_id',$request->user_id);

            $q->whereHas('tags',function($q)use($request,$tag){
                $q->where('tag_id',$tag->id);
            });
        })->with(['categories','tags'])->withCount(['comments'=>function($q){$q->where('reviewed',1);}])->orderBy('id','DESC')->paginate();

        return view('front.pages.blog',compact('articles','tag'));
    }
    public function article(Request $request,Article $article)
    {
        $article->load(['categories','comments'=>function($q){$q->where('reviewed',1);},'tags'])->loadCount(['comments'=>function($q){$q->where('reviewed',1);}]);
        $this->views_increase_article($article);
        return view('front.pages.article',compact('article'));
    }
    public function page(Request $request,Page $page)
    {
    
        $customView = 'front.pages.custom-pages.' . $page->slug;

        if(view()->exists($customView)) {
            // If the file exists, return custom page
            return view($customView,compact('page'));
        }         

        return view('front.pages.page',compact('page'));
    }
    public function blog(Request $request)
    {
        $articles = Article::where(function($q)use($request){
            if($request->category_id!=null)
                $q->where('category_id',$request->category_id);
            if($request->user_id!=null)
                $q->where('user_id',$request->user_id);
        })->with(['categories','tags'])->withCount(['comments'=>function($q){$q->where('reviewed',1);}])->orderBy('id','DESC')->paginate();
        return view('front.pages.blog',compact('articles'));
    }
    public function views_increase_article(Article $article)
    {
        $counter = $article->item_seens()->where('type',"ARTICLE")->where('ip',\UserSystemInfoHelper::get_ip())->whereDate('created_at', \Carbon::today())->count();
        if (!$counter) {
            \App\Models\ItemSeen::create([
                'type_id'=>$article->id,
                'type'=>"ARTICLE",
                'ip'=>\UserSystemInfoHelper::get_ip(),
                'prev_link'=>\UserSystemInfoHelper::prev_url(),
                'agent_name'=>request()->header('User-Agent'),
                'browser'=>\UserSystemInfoHelper::get_browsers(),
                'device'=>\UserSystemInfoHelper::get_device(),
                'operating_system'=>\UserSystemInfoHelper::get_os()
            ]);
            $article->update(['views' => $article->views + 1]);
        }
    }
}

