<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Helpers\Helper;
use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use App\Utils\JsonExtraField;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements TranslatableContract
{
    use HasFactory, Translatable, JsonExtraField,ObserversTrait;

    public $translatedAttributes = ['title', 'details', 'text'];

    protected $fillable = [
        'slug', 'options',
        'pictures'
    ];

    public static $faName = 'مقاله';

    protected $appends = ['pictures'];

    protected $casts = [
        'options' => Json::class
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function getDisplayDate($pFormat = 'l d F Y',$gFormat = 'Y F d l')
    {
        return Helper::localeIsPersian() ? verta($this->date)->format($pFormat) : $this->date->format($gFormat);
    }

    public function getPicturesAttribute()
    {
        return $this->getExtraValue('pictures');
    }

    public function setPicturesAttribute($value)
    {
        $this->setExtraValue('pictures', $value);
    }

    public function getBannerAttribute()
    {
        return $this->pictures[0] ?? null;
    }

}
