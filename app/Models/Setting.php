<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];

    public function website_logo(){
        if($this->where('key','website_logo')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_LOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->where('key','website_logo')->pluck('value')->first();
    }
    public function website_cover(){
        if($this->where('key','website_cover')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_COVER');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->where('key','website_cover')->pluck('value')->first();
    }
    public function website_wide_logo(){
        if($this->where('key','website_wide_logo')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_WIDELOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->where('key','website_wide_logo')->pluck('value')->first();
    }
    public function website_icon(){
        if($this->where('key','website_icon')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_FAVICON');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->where('key','website_icon')->pluck('value')->first();
    }
    public function main_color(){
        if($this->where('key','main_color')->pluck('value')->first()==null)
            return "#2196f3";
        else
            return $this->where('key','main_color')->pluck('value')->first();
    }
    public function hover_color(){
        if($this->where('key','hover_color')->pluck('value')->first()==null)
            return "#2196f3";
        else
            return $this->where('key','hover_color')->pluck('value')->first();
    }
    public function phone(){
        if($this->where('key','phone')->pluck('value')->first()==null)
            return "";
        else
            return $this->where('key','phone')->pluck('value')->first();
    }

    

}
