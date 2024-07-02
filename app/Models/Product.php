<?php

namespace App\Models;

use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use App\Utils\JsonExtraField;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract
{

    use Translatable,HasFactory,JsonExtraField,ObserversTrait;

    public static $faName = 'محصول';



    public $visibilityStatuses = ['فعال','غیرفعال'];
    public $priceStatuses = ['بزودی','قیمت عادی','تماس بگیرید','توقف فروش'];
    public $discountStatuses = ['percent' => 'درصد','fixed' => 'ثابت'];

    public $dates = [
        'special_price_start',
        'special_price_end',
    ];

    protected $appends = [
        'first_image',
        'pictures','banner',
        'price_status_text',
        'visibility_status_text',
    ];

    public $translatedAttributes = ['name', 'long_description','short_description','tags',];

    protected $fillable = [
        'slug',
        'pictures',
        'visibility',
        'price_status',
        'category_id',
        'price',
        'discount',
        'discount_type',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'in_stock',
        'manage_stock',
        'qty',
        'view_count',
        'sales_integer',
    ];

    public function getFirstImageAttribute()
    {
        return is_array($this->images) && count($this->images) != 0 ? 'storage/' . $this->images[0] : '';
    }


    public function getPriceStatusTextAttribute()
    {
        if($this->price_status == 0){
            return 'Coming soon';
        }
        elseif($this->price_status == 1){
            return 'Normal (Price)';
        }
        elseif($this->price_status == 2){
            return 'Call';
        }
        elseif($this->price_status == 3){
            return 'Stop build';
        }

    }

    public function getVisibilityStatusTextAttribute()
    {
        if($this->visibility == 0){
            return 'Hidden';
        }
        else {
            return 'Visible';
        }

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    protected $casts = [
        'options' => Json::class
    ];


    public function getPicturesAttribute()
    {
        return $this->getExtraValue('pictures');
    }

    public function setPicturesAttribute($value)
    {
        $this->setExtraValue('pictures',$value);
    }

    public function getBannerAttribute()
    {
        return $this->pictures[0] ?? null;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public static function getClosure()
    {
        return function (Builder $builder) {
            $q = request('q');
            $hasQ = request()->filled('q');

            /** @var Product|Builder $builder */
            if ($hasQ) {
                $builder->orWhere('slug', 'like', "%{$q}%");
                $builder->orWhereTranslationLike('name', "%{$q}%");
                $builder->orWhereTranslationLike('long_description', "%{$q}%");
                $builder->orWhereTranslationLike('short_description', "%{$q}%");
            }
            if (request()->filled('tag')) {
                $tag = request('tag');
                $builder->orWhereTranslationLike('tags', "%{$tag}%");
            }
        };
    }
}
