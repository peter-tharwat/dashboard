<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Plugin extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $casts =[
        'settings'=>"array"
    ];
    protected static function booted()
    {
        /*static::creating(function ($model) {
            if (app()->bound('website') && $website = app('website')) {
                $model->website_id = $model->website_id != null ? $model->website_id : $website->id;
            }
        });
        static::addGlobalScope('website', function (Builder $builder) {
            if (app()->bound('website') && $website = app('website')) {
                $builder->where('website_id', $website->id);
            }
        });*/
    }

}
