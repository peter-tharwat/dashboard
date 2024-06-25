<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model implements TranslatableContract
{
    public $translatedAttributes = ['title', 'sdasd', 'description'];

    use HasFactory;
    use Translatable;
}
