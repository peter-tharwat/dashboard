<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateLimitDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function rate_limit(){
        return $this->belongsTo('\App\Models\RateLimit');
    }
    public function user(){
        return $this->belongsTo('\App\Models\User');
    }
}
