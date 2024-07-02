<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementTranslation extends Model
{
    public $fillable = ['description', 'title'];

    use HasFactory;
}
