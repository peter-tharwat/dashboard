<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model implements TranslatableContract
{
    public $searchable = ['answer', 'question'];

    public $columns = ['is_featured', 'order'];

    public $translatedAttributes = ['answer', 'question'];

    use HasFactory;
use Translatable;
    public $guarded=['id','created_at','updated_at'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
