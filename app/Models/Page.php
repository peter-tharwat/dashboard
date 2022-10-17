<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
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
    public function image(){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else
            return env("STORAGE_URL")."/uploads/pages/".$this->image;
    }
}
