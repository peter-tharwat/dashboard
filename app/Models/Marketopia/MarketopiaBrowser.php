<?php

namespace App\Models\Marketopia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class MarketopiaBrowser extends  Model implements TranslatableContract
{

    use Translatable; // 2. To add translation methods
    use HasFactory;
    public $guarded = ['id'];
    public $translatedAttributes = ['name'];

    // create translations relationship
    public function browser_translations()
    {
        return $this->hasMany(MarketopiaBrowserTranslation::class, 'marketopia_browser_id');
    }
    
}
