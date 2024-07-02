<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Traits\ObserversTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable,ObserversTrait;

    public $timestamps = false;
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug','svg'];

    public static $faName = 'دسته بندی';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}
