<?php

namespace App\Models;

use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model implements TranslatableContract
{
    use ObserversTrait;
    public static $faName = 'اسلاید';

    use Translatable;
    public $timestamps = false;
    protected $fillable = ['name', 'url', 'image', 'type','position', 'active'];
    public $translatedAttributes = ['title', 'details'];
}
