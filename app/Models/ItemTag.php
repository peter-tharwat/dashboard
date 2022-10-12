<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
class ItemTag extends Model
{
    use HasFactory;
    protected $guarded=['id','created_at','updated_at'];
    public function tag(){
        return $this->belongsTo(\App\Models\Tag::class,'tag_id');
    }
}
