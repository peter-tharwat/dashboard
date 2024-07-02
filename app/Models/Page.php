<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;

class Page extends Model implements HasMedia
, TranslatableContract{
    public $searchable = ['description', 'meta_description', 'title'];

    public $columns = ['image', 'removable', 'slug'];

    public $translatedAttributes = ['description', 'meta_description', 'title'];

    use HasFactory;
    use InteractsWithMedia;
use Translatable;
    public $guarded=['id','created_at','updated_at'];
    public $appends=['url'];
    public function getUrlAttribute(){
        return route('page.show',$this);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function image($type="original"){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.\MainHelper::get_conversion($this->image,$type);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('tiny')
            ->fit(Manipulations::FIT_MAX, 120, 120)
            ->width(120)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_MAX, 350, 1000)
            ->width(350)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

        $this
            ->addMediaConversion('original')
            ->fit(Manipulations::FIT_MAX, 1200,10000)
            ->width(1200)
            ->format(Manipulations::FORMAT_WEBP)
            ->nonQueued();

    }
}
