<?php

namespace Modules\Team\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\TeamFactory::new();
    }

    public function image($type=null){
        if($this->image==null)
            return env('DEFAULT_IMAGE');
        else if($type=="small")
            return env("STORAGE_URL")."/uploads/teams/".$this->image;
        else
            return env("STORAGE_URL")."/uploads/teams/small/".$this->image;
    }

}
