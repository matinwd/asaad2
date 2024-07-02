<?php

namespace App\Models;

use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use Translatable, ObserversTrait;

    public static $faName = 'تنظیمات';


    public $timestamps = false;

    public $translatedAttributes = ['value'];
    protected $fillable = [
        'key', 'label'
    ];

    protected $with = ['translations'];

    public function getValAttribute()
    {
        $value = $this->value;

        if (is_array($value))
            foreach ($value ?? [] as $index => $item)
                if (isset($value[$index]['value']) && str_contains($value[$index]['value'], '&')) {
                    $value[$index]['value'] = explode('&', $item['value']);
                }
        return $value;
    }
}
