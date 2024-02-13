<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use Translatable;
    use Resizable;
    use SearchableTrait;


    protected $translatable = ['title', 'seo_title', 'excerpt', 'body', 'slug', 'meta_description', 'meta_keywords'];
    protected $table='articles';

    const PUBLISHED = 'PUBLISHED';
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
           'posts.title' => 10,
            'posts.excerpt'=>4,
            'posts.body' => 4,
            'editors.name'=>2,
            'tags.tag_text'=>5,
        
        ],
        'joins' => [
            'editors' => ['posts.editor_id','editors.id'],
            'post_tag'=>['posts.id','post_id'],
            'tags'=>['tags.id','post_tag.tag_id']
        ],
       
    ];
    protected $guarded = [];

    
    

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('created_at', '<=', \Carbon\Carbon::now()->toDateTimeString());
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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags', 'article_id', 'tag_id');
    }

    public function likes(){
        return $this->hasMany(Like::class);
      }

      public function item_seens()
      {
          return $this->hasMany(\App\Models\ItemSeen::class,'type_id','id')->where('type',"ARTICLE");
      }
      
      public function favorites(){
        return $this->hasMany(Favorite::class);
      }

      public function main_image($type='thumb'){
        if($this->main_image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_DOMAIN").env("STORAGE_URL").'/'.\App\Helpers\MainHelper::get_conversion($this->main_image,$type);
    }
}
