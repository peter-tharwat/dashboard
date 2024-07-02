<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\Image\Enums\Fit;
class Category extends Model implements HasMedia, TranslatableContract
{

    
    use HasFactory;
    use InteractsWithMedia;
    use Translatable;
    public $translatedAttributes = ['title', 'meta_description', 'description'];
    
    public $my_translatedAttributes = [
        'title' => 'string', 
        'meta_description'=>'textarea', 
        'description'=>'editor'
    ];
    public $guarded = ['id','created_at','updated_at'];
    public $columns = ['user_id','slug', 'image'];
    public $my_columns = [
        'user_id' => 'no',
        'image'     => 'file',
        'slug'      => 'string'
    ];
    public $indexWith = [];
    public $indexWithCount = ['articles'];
    public $appends=['url'];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
    public function getUrlAttribute(){
        return route('category.show',$this);
    }
    public function articles(){
        return $this->belongsToMany(\App\Models\Article::class,'article_categories');
    }
    public function image($type='thumb'){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.\MainHelper::get_conversion($this->image,$type);
    }
    public function registerMediaConversions(?Media $media = null): void
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
            ->fit(Fit::Max, 1200,10000)
            ->width(1200)
            ->format('webp')
            ->nonQueued();
    }

}
