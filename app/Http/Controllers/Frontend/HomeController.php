<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Editor;
use App\Models\Category;
use App\Models\Page;

class HomeController extends Controller
{

    public function index()
    {
        $research=Article::research()->latest()->get()->take(5);

        $most_viewed_research=Article::research()->orderBy('views', 'desc')->get()->take(4);

        $latestposts=Article::article()->latest()->get()->take(5);

        $latestnews=Article::news()->latest()->get()->take(4);

        $discussions=Article::discussion()->latest()->get()->take(4);
        $policies=Article::policies()->latest()->get()->take(4);
        $booksReviews=Article::booksReview()->latest()->get()->take(4);
        $books=Article::book()->latest()->get()->take(4);
        $workshops_latest=Article::workshop()->latest()->get()->take(3);
        $workshops_most=Article::workshop()->orderBy('views', 'desc')->get()->take(3);
        $featured_posts=Article::featured()->latest()->get();
        $categories =  Category::withCount(['articles'])->orderBy('articles_count','DESC')->get();

        return view('front.index',compact('research','categories','most_viewed_research','featured_posts','latestnews','workshops_latest','workshops_most','latestposts','discussions','policies','booksReviews','books'));
    }


    public function category($category)
    {
        $latestnews=Article::news()->latest()->get()->take(4);

        $discussions=Article::discussion()->latest()->get()->take(4);
        $policies=Article::policies()->latest()->get()->take(4);
        $categories =  Category::withCount(['articles'])->orderBy('articles_count','DESC')->get();

        $category=Category::where('slug',$category)->firstOrFail();
        $posts=$category->articles()->paginate(6);

        return view('front.category',compact('category','categories','posts','latestnews','discussions','policies'));
    }

    public function authors()
    {
        $latestnews=Article::news()->latest()->get()->take(4);

        $discussions=Article::discussion()->latest()->get()->take(4);
        $policies=Article::policies()->latest()->get()->take(4);
        $categories =  Category::withCount(['articles'])->orderBy('articles_count','DESC')->get();

        $authors=Editor::withCount(['articles'])->orderBy('articles_count','DESC')->paginate(6);

        return view('front.authors',compact('authors','categories','latestnews','discussions','policies'));
    }
    public function author($author)
    {
        $latestnews=Article::news()->latest()->get()->take(4);

        $discussions=Article::discussion()->latest()->get()->take(4);
        $policies=Article::policies()->latest()->get()->take(4);
        $categories =  Category::withCount(['articles'])->orderBy('articles_count','DESC')->get();

        $author=Editor::where('slug',$author)->firstOrFail();
        $posts=$author->articles()->paginate(6);
        return view('front.author',compact('author','categories','posts','latestnews','discussions','policies'));
    }

    public function page($page)
    {
        $latestnews=Article::news()->latest()->get()->take(4);

        $discussions=Article::discussion()->latest()->get()->take(4);
        $policies=Article::policies()->latest()->get()->take(4);
        $categories =  Category::withCount(['articles'])->orderBy('articles_count','DESC')->get();

        $page=Page::where('slug',$page)->firstOrFail();
        return view('front.page',compact('page','categories','latestnews','discussions','policies'));
    }

}
