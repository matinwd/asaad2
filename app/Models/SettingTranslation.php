<?php

namespace App\Models;

use App\Models\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['value'];

    protected $casts = ['value' => Json::class];

    public function getValAttribute()
    {
        $value = $this->value;

        if (is_array($value))
            foreach ($value ?? [] as $index => $item)
                if (isset($value[$index]['value']) && str_contains($value[$index]['value'], '&')) {
                    $value[$index]['value'] = explode('&', $item['value']);
                }
        return $value;
    }
}
