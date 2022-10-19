<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $guarded=['id','created_at','updated_at'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function item_seens()
    {
        return $this->hasMany(\App\Models\ItemSeen::class,'type_id','id')->where('type',"ARTICLE");
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function categories(){
        return $this->belongsToMany(\App\Models\Category::class,'article_categories');
    }
    public function comments(){
        return $this->hasMany(\App\Models\ArticleComment::class,'article_id');
    }
    public function main_image($type=null){
        if($this->main_image==null)
            return env('DEFAULT_IMAGE');
        else if($type=="small")
            return env("STORAGE_URL")."/uploads/articles/".$this->main_image;
        else
            return env("STORAGE_URL")."/uploads/articles/small/".$this->main_image;
    }
    public function tags(){
        return $this->belongsToMany(\App\Models\Tag::class,'article_tags');

    }
}
