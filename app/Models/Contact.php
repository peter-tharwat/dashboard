<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\Image\Enums\Fit;

class Contact extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    public $guarded=['id','created_at','updated_at'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function replies()
    {
        return $this->hasMany(\App\Models\ContactReply::class)/*->orderBy('id','DESC')*/;
    }
    public function files(){
        return $this->hasMany(\App\Models\HubFile::class,'type_id')->where('type','CONTACT');
    }
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('tiny')
            ->fit(Fit::Max, 120, 120)
            ->width(120)
            ->format('webp')
            ->nonQueued();

        $this
            ->addMediaConversion('thumb')
            ->fit(Fit::Max, 350, 1000)
            ->width(350)
            ->format('webp')
            ->nonQueued();

        $this
            ->addMediaConversion('original')
            ->fit(Fit::Max, 1200, 10000)
            ->width(1200)
            ->format('webp')
            ->nonQueued();

    }
}
