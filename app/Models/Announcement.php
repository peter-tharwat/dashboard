<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function image(){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL")."/uploads/announcements/".$this->image;
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
}
