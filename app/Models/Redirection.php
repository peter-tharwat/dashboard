<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirection extends Model
{
    use HasFactory;
    public $guarded=['id','created_at','updated_at'];
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
