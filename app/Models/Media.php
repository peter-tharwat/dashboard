<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
#use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media as MediaModel;

class Media extends MediaModel
{
    use HasFactory;
    protected $guarded=[];
}
