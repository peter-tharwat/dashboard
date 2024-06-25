<?php

namespace App\Models\Marketopia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class MarketopiaCity extends  Model implements TranslatableContract
{

    use Translatable; // 2. To add translation methods
    use HasFactory;
    public $guarded = ['id'];

    public $translatedAttributes = ['name'];


    public function city_translations()
    {
        return $this->hasMany(MarketopiaCityTranslation::class, 'marketopia_city_id');
    }
    public function country()
    {
        return $this->belongsTo(MarketopiaCountry::class, 'country_id');
    }
    // Create relationship continent with country
    public function state()
    {
        return $this->belongsTo(MarketopiaState::class, 'state_id');
    }
}
