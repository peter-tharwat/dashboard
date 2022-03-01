<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Contact;


class FrontController extends Controller
{
    public function index(Request $request)
    {
        return view('front.index');
    }
    public function contact_post(Request $request)
    {
        $request->validate([
            'name'=>"required|min:3|max:190",
            'email'=>"nullable|email",
            "phone"=>"required|numeric",
            "message"=>"required|min:3|max:10000",
        ]);
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>"قادم من : ".urldecode(url()->previous())."\n\nالرسالة : ".$request->message
        ]);
        flash()->success('تم استلام رسالتك بنجاح وسنتواصل معك في أقرب وقت');
        //\Session::flash('message', __("Your Message Has Been Send Successfully And We Will Contact You Soon !"));
        return redirect()->back();
    }
    
    public function article(Request $request,Article $article)
    {
        return view('front.pages.article',compact('article'));
    }
    public function blog(Request $request)
    {
        $articles = Article::where(function($q)use($request){
            if($request->category_id!=null)
                $q->where('category_id',$request->category_id);
        })->orderBy('id','DESC')->paginate();
        return view('front.pages.blog',compact('articles'));
    }
}

