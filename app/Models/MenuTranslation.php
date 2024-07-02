<?php

namespace App\Models;

use App\Models\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['items'];

    protected $casts = ['items' => Json::class];

    public function getVueItemsAttribute()
    {
        return collect(is_array($this->items) ? $this->items : json_decode($this->items,true))->map(function ($item) {
            $item['_open'] = false;
            return $item;
        })->toArray();
    }
}
