<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Helpers\Helper;
use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use App\Utils\JsonExtraField;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements TranslatableContract
{
    use HasFactory, Translatable,JsonExtraField,ObserversTrait;

    public $translatedAttributes = ['title', 'details', 'text', 'tags'];
//    protected $with = ['translations'];
    protected $fillable = [
        'slug', 'date', 'category_id', 'status', 'options',
        'pictures',
    ];
    protected $appends = ['pictures','banner'];

    protected $casts = [
        'options' => Json::class
    ];

    protected $dates = ['date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDisplayDate($pFormat = 'l d F Y',$gFormat = 'Y F d l')
    {
        return Helper::localeIsPersian() ? verta($this->date)->format($pFormat) : $this->date->format($gFormat);
    }

    public function getPicturesAttribute()
    {
        return $this->getExtraValue('pictures');
    }

    public static $faName = 'خبر';


    public function setPicturesAttribute($value)
    {
        $this->setExtraValue('pictures',$value);
    }

    public function getBannerAttribute()
    {
        return $this->pictures[0] ?? null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getClosure()
    {
        return function (Builder $builder) {
            $q = request('q');
            $hasQ = request()->filled('q');

            /** @var Post|Builder $builder */
            if ($hasQ) {
                $builder->orWhere('slug', 'like', "%{$q}%");
                $builder->orWhereTranslationLike('title', "%{$q}%");
                $builder->orWhereTranslationLike('details', "%{$q}%");
                $builder->orWhereTranslationLike('text', "%{$q}%");
            }
            if (request()->filled('tag')) {
                $tag = request('tag');
                $builder->orWhereTranslationLike('tags', "%{$tag}%");
            }
        };
    }

}
