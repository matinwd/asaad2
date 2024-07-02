<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model implements TranslatableContract
{
    use HasFactory,Translatable,ObserversTrait;

    public $timestamps = false;
    public $translatedAttributes = ['items'];
    protected $fillable = ['name'];

    public static $faName = 'منو';

    public function getRouteKeyName()
    {
        return 'name';
    }


}
