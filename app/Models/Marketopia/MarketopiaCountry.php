<?php

namespace App\Models\Marketopia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class MarketopiaCountry extends  Model implements TranslatableContract
{

    use Translatable; // 2. To add translation methods
    use HasFactory;
    public $guarded = ['id'];
    
    public $translatedAttributes = ['name'];

    public function country_translations()
    {
        return $this->hasMany(MarketopiaCountryTranslation::class, 'marketopia_country_id');
    }
    public function cities()
    {
        return $this->hasMany(MarketopiaCity::class, 'marketopia_country_id');
    }
    // Create relationship continent with country
    public function continent()
    {
        return $this->belongsTo(MarketopiaContinent::class, 'continent_id');
    }
    // Create relationship sub continent with country
    public function sub_continent()
    {
        return $this->belongsTo(MarketopiaSubContinent::class, 'sub_continent_id');
    }

}
