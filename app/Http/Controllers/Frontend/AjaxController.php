<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AjaxController extends Controller
{

    public function likes($id){
       if(Article::find($id)->likes()->where('user_id',  Auth::user()->id)->get()->isEmpty()){
        $like=new Like();
        $like->post_id=$id;
        $like->user_id=Auth::user()->id;
        $like->liked=1;
        $like->save();
       }
       else{
        Like::where(['post_id'=>$id],['user_id'=>Auth::user()->id])->delete();
       }
        
    
    } 

    public function favorites($id){
        if(Article::find($id)->favorites()->where('user_id',  Auth::user()->id)->get()->isEmpty()){
         $favorite=new Favorite();
         $favorite->post_id=$id;
         $favorite->user_id=Auth::user()->id;
         $favorite->save();
        }
        else{
         Favorite::where(['post_id'=>$id],['user_id'=>Auth::user()->id])->delete();
        }
         
     
     } 
}
