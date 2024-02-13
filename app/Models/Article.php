<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
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

    
    public function category(){
        return $this->belongsTo(\App\Models\Category::class);
    }
    public function editor(){
        return $this->belongsTo(\App\Models\Editor::class);
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

    public function scopeResearch(Builder $query)
    {
        $category=Category::where('title','الأبحاث')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }

    public function scopeArticle(Builder $query)
    {
        $category=Category::where('title','المقالات البحثية')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }

    public function scopeNews(Builder $query)
    {
        $category=Category::where('title','الأخبار')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }

    public function scopeDiscussion(Builder $query)
    {
        $category=Category::where('title','الحوارات')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }
    
    public function scopePolicies(Builder $query)
    {
        $category=Category::where('title','أوراق السياسات')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }   

    public function scopeBooksReview(Builder $query)
    {
        $category=Category::where('title','مراجعات الكتب')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    } 

    public function scopeBook(Builder $query)
    {
        $category=Category::where('title','إصدارات المركز')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }

    public function scopeWorkshop(Builder $query)
    {
        $category=Category::where('title','أوراق العمل')->limit(1)->get()[0];
        return $query->where('category_id', $category->id);
    }

    public function scopeFeatured(Builder $query)
    {
        return $query->where('is_featured', 1);
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
