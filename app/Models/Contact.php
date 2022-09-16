<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
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
}
