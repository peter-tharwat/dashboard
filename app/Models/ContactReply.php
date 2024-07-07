<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\Image\Enums\Fit;

 

class ContactReply extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    public function contact()
    {
        return $this->belongsTo('\App\Models\Contact','contact_id');
    }
    public function files(){
        return $this->hasMany(\App\Models\HubFile::class,'type_id')->where('type','CONTACT_REPLY');
    }
}
