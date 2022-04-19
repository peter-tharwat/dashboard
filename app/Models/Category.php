<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $guarded=['id','created_at','updated_at'];
    public $appends=['url'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function getUrlAttribute(){
        return route('category.show',$this);
    }
    public function articles(){
        return $this->belongsToMany(\App\Models\Article::class,'article_categories');
    }
    public function image(){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL")."/uploads/categories/".$this->image;
    }
}
