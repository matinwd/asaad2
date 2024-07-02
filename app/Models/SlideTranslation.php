<?php

namespace App\Models;

use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SlideTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'details'];
}
