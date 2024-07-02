<?php

namespace App\Models;

use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    use Translatable,ObserversTrait;

    public static $faName = 'سوال';

    protected $fillable = [
        'created_at','updated_at'
    ];

    public $translatedAttributes = ['name','description'];
}
