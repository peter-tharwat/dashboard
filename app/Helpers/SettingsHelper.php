<?php
namespace App\Helpers;
use App\Models\Setting;
class SettingsHelper {

    public $settings;
    public function __construct(){
        $this->settings = collect($this->settings);
    }
    public function getAllSettings(){
        $settings = \App\Models\Setting::get();
        foreach($settings as $setting){
            if(is_object(json_decode($setting->value))){
                $this->settings[$setting->key] =  json_decode($setting->value,true);
            }
            $this->settings[$setting->key] = $setting->value;
        }
        $this->settings["get_website_logo"] = $this->website_logo();
        $this->settings["get_website_cover"] = $this->website_cover();
        $this->settings["get_website_wide_logo"] = $this->website_wide_logo();
        $this->settings["get_website_icon"] = $this->website_icon();
        
        return $this->settings;
    }


    public function website_logo(){
        if($this->settings->where('key','website_logo')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_LOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->settings->where('key','website_logo')->pluck('value')->first();
    }
    public function website_cover(){
        if($this->settings->where('key','website_cover')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_COVER');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->settings->where('key','website_cover')->pluck('value')->first();
    }
    public function website_wide_logo(){
        if($this->settings->where('key','website_wide_logo')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_WIDELOGO');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->settings->where('key','website_wide_logo')->pluck('value')->first();
    }
    public function website_icon(){
        if($this->settings->where('key','website_icon')->pluck('value')->first()==null)
            return env('DEFAULT_IMAGE_FAVICON');
        else
            return env('STORAGE_URL').'/uploads/website/'.$this->settings->where('key','website_icon')->pluck('value')->first();
    }





}