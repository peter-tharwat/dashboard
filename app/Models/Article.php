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

class Article extends Model implements HasMedia, TranslatableContract{
    public $searchable = ['description', 'meta_description', 'title'];

    public $columns = ['is_featured', 'main_image', 'slug'];

    public $translatedAttributes = ['description', 'meta_description', 'title'];




    use HasFactory;
    use InteractsWithMedia;
use Translatable;
    public $guarded=['id','created_at','updated_at'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function item_seens()
    {
        return $this->hasMany(\App\Models\ItemSeen::class,'type_id','id')->where('type',"ARTICLE");
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function categories(){
        return $this->belongsToMany(\App\Models\Category::class,'article_categories');
    }
    public function comments(){
        return $this->hasMany(\App\Models\ArticleComment::class,'article_id');
    }
    public function main_image($type='thumb'){
        if($this->main_image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.\MainHelper::get_conversion($this->main_image,$type);
    }
    public function tags(){
        return $this->belongsToMany(\App\Models\Tag::class,'article_tags');

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
