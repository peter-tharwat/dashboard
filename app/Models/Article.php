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
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }
    public function main_image(){
        if($this->main_image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL")."/uploads/articles/".$this->main_image;
    }

}
