<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id');
    }
    public function article(){
        return $this->belongsTo(\App\Models\Article::class,'user_id');
    }
}
