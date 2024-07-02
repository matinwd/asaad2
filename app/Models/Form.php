<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use ObserversTrait;
    protected $fillable = [
        'name', 'slug', 'content'
    ];
    protected $casts = [
        'content' => Json::class,
    ];

    public static $faName = 'فرم';


    public function getContentTwoAttribute()
    {
        $items = [];
        foreach ($this->content ?? [] as $index => $item) {
            if ($item['fieldType'] == 'ProvinceCity') {
                $items[] = $item;
                if ($item['has_city']) {
                    $newItem = $item;
                    $newItem['name'] = 'city__' . $newItem['name'];
                    $newItem['label'] = 'شهر';
                    $items[] = $newItem;
                }
            } else
                $items[] = $item;
        }
        return $items;
    }

    public function answers()
    {
        return $this->hasMany(FormAnswer::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
