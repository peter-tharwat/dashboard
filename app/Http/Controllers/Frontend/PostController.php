<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Editor;
use App\Models\Tag;
use App\Models\ItemSeen;
use View;
use Auth;
class PostController extends Controller
{
    
    
    public function __invoke()
    {
      /*  $posts=Post::published()->latest()->paginate(3);
        $cats=Category::all();
        $most_tags =Tag::withCount('post_tags')->orderBy('post_tags_count', 'desc')->get()->take(5);
        $most_posts =Post::published()->withCount('likes')->orderBy('likes_count', 'desc')->get()->take(9);
        $most_editors=Editor::withCount('likes')->orderBy('likes_count','desc')->get()->take(3);
        $pinnednews=News::published()->wherePinned('1')->get();
        $latestnews=News::published()->latest()->get()->take(6);
        $sorted='latest';
        $cated='all';
       //$most_editors=Editor::with('posts')->sum('visits_count')->orderBy('aggregate','desc')->get()->take(3);

     return view('articles',compact('posts','cats','most_tags','most_editors','pinnednews','latestnews','most_posts','sorted','cated'));
    */
    }

    public function views_increase_article(Article $article)
    {
        $counter = $article->item_seens()->where('type',"ARTICLE")->where('ip',\UserSystemInfoHelper::get_ip())->whereDate('created_at', \Carbon::today())->count();
        if (!$counter) {
            ItemSeen::create([
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

    public function article($category,$post_slug)
    {

        $latestnews=Article::news()->latest()->get()->take(4);

        $discussions=Article::discussion()->latest()->get()->take(4);
        $policies=Article::policies()->latest()->get()->take(4);
        $categories =  Category::withCount(['articles'])->orderBy('articles_count','DESC')->get();

        $article=Article::where('slug',$post_slug)->first();
        if($article)
        $article->load(['category','tags']);
        $this->views_increase_article($article);
        return view('front.article',compact('article','categories','latestnews','discussions','policies'));
    }

    public function filter($filter_type,$filter_para)
    {
      /*  $cats=Category::all();
        $most_tags =Tag::withCount('post_tags')->orderBy('post_tags_count', 'desc')->get()->take(5);
        $most_posts =Post::published()->withCount('likes')->orderBy('likes_count', 'desc')->get()->take(9);
        $most_editors=Editor::withCount('likes')->orderBy('likes_count','desc')->get()->take(3);
        $pinnednews=News::published()->wherePinned('1')->get();
        $latestnews=News::published()->latest()->get()->take(6);
        $sorted='latest';
        $cated='all';

        switch($filter_type){
        case 'tags':
        $posts = Post::published()->whereHas('tags', function($query) use ($filter_para) {
        $query->wheretag_text($filter_para);
          })->paginate(3);break;
        case 'editors':
           $posts=Editor::find($filter_para)->posts()->published()->paginate(3);
        break;       
        case 'categories':
           $cated=$filter_para;
           $posts=Category::find($filter_para)->posts()->published()->paginate(3);
        break;
        case 'search':
            $posts=Post::published()->latest()->paginate(3);
        break;
        case 'sort':
            $sorted=$filter_para;
            if($filter_para=='latest')
                 $posts=Post::published()->latest()->paginate(3);
            else if($filter_para=='most_liked')
                $posts=Post::published()->withCount('likes')->orderBy('likes_count', 'desc')->paginate(3);
            else if($filter_para=='most_visited')
                 $posts=Post::published()->orderBy('visits_count','desc')->paginate(3);
            else if($filter_para=='favorited')
                if(Auth::user())
                 $posts=Auth::user()->favorites()->paginate(3);                
               else
                 return redirect('login');
        
        }
        
        return view('articles',compact('posts','cats','most_tags','most_editors','pinnednews','latestnews','most_posts','sorted','cated'));
    */
    }
    
    public function read_more($article_id){
    /*    $cats=Category::all();
        $most_tags =Tag::withCount('post_tags')->orderBy('post_tags_count', 'desc')->get()->take(5);
        $most_posts =Post::published()->withCount('likes')->orderBy('likes_count', 'desc')->get()->take(9);
        $most_editors=Editor::withCount('likes')->orderBy('likes_count','desc')->get()->take(3);
        $pinnednews=News::published()->wherePinned('1')->get();
        $latestnews=News::published()->latest()->get()->take(6);
        $sorted='latest';
        $cated='all';

        $post=Post::published()->find($article_id);
        $post->increment('visits_count') ;
        return view('article',compact('post','cats','most_tags','most_editors','pinnednews','latestnews','most_posts','sorted','cated'));
    */
    }

    public function copyinc($id){
        $post=Article::find($id);
        $post->increment('quotes_count') ;
    }
    public function search(Request $request)
    {
   /* $search_word= $request->get('search');
    $posts = Post::search($search_word ,null, true)->published()->paginate(Post::count());
    $cats=Category::all();
    $most_tags =Tag::withCount('post_tags')->orderBy('post_tags_count', 'desc')->get()->take(5);
    $most_posts =Post::published()->withCount('likes')->orderBy('likes_count', 'desc')->get()->take(9);
    $most_editors=Editor::withCount('likes')->orderBy('likes_count','desc')->get()->take(3);
    $pinnednews=News::published()->wherePinned('1')->get();
    $latestnews=News::published()->latest()->get()->take(6);
    $sorted='latest';
    $cated='all';
   //$most_editors=Editor::with('posts')->sum('visits_count')->orderBy('aggregate','desc')->get()->take(3);

 return view('articles',compact('search_word','posts','cats','most_tags','most_editors','pinnednews','latestnews','most_posts','sorted','cated'));

    */
    }
}
