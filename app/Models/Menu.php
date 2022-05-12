<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $guarded=['id','created_at','updated_at'];
    public function getRouteKeyName(){
        return 'location';
    }
    public function links(){
        return $this->hasMany(\App\Models\MenuLink::class,'menu_id');
    }
}
