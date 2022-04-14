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
}
