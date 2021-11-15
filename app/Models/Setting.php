<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function website_logo(){
        if($this->website_logo==null)
            return env('DEFAULT_IMAGE_LOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->website_logo;
    }
    public function website_cover(){
        if($this->website_cover==null)
            return env('DEFAULT_IMAGE_COVER');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->website_cover;
    }
    public function website_wide_logo(){
        if($this->website_wide_logo==null)
            return env('DEFAULT_IMAGE_COVER');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->website_wide_logo;
    }
    public function website_icon(){
        if($this->website_icon==null)
            return env('DEFAULT_IMAGE_COVER');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->website_icon;
    }

    

    

}
