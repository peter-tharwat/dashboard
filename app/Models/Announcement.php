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

class Announcement extends Model implements HasMedia {
    public $searchable = ['description', 'title'];

    public $columns = ['image', 'location', 'open_url_in', 'url'];

    public $translatedAttributes = ['description', 'title'];





    
    use HasFactory;
    use InteractsWithMedia;
use Translatable;
    protected $guarded=[];
    public function image($type="original"){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL").'/'.\MainHelper::get_conversion($this->image,$type);
    }

    public function getStartDateAttribute($value)
    {
        if($value==null)return;
        return \Carbon::parse($value)->format('Y-m-d\TH:i');
    }
    public function getEndDateAttribute($value)
    {
        if($value==null)return;
        return \Carbon::parse($value)->format('Y-m-d\TH:i');
    }
    public function registerMediaConversions(?Media $media = null): void
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
