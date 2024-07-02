<?php

namespace App\Models;

use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model implements TranslatableContract
{
    public static $faName = 'صفحه';

    use HasFactory, Translatable,ObserversTrait;

    public $timestamps = false;

    public $translatedAttributes = ['title', 'image', 'content', 'keywords','short_description'];
    protected $fillable = [
        'name', 'slug','users', 'password','active',
    ];

    protected $casts = [
        'users' => Json::class,
        'password' => 'bool',
        'active' => 'bool',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
