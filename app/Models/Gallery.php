<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Casts\Json;
use App\Utils\JsonExtraField;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model implements TranslatableContract
{
    use Translatable, JsonExtraField;

    public $timestamps = false;
    public $translatedAttributes = ['title', 'text', 'tags'];
    protected $fillable = [
        'slug', 'date', 'image', 'active', 'options',
        'pictures',
    ];
    protected $dates = ['date'];
    protected $appends = ['pictures'];
    protected $casts = [
        'options' => Json::class
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to only include active languages.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function getDisplayDate($pFormat = 'l d F Y', $gFormat = 'Y F d l')
    {
        $date = $this->date;
        return Helper::localeIsPersian() ? verta($date)->format($pFormat) : $date->format($gFormat);
    }

    public function getPicturesAttribute()
    {
        return $this->getExtraValue('pictures');
    }

    public function setPicturesAttribute($value)
    {
        $this->setExtraValue('pictures', $value);
    }
}
