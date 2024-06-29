<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $fillable = ['description', 'meta_description', 'title'];

    use HasFactory;
}
