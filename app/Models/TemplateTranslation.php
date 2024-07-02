<?php

namespace App\Models;

use App\Models\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'image','content', 'seo','keywords','short_description'];

    protected $casts = [
        'content' => Json::class,
        'seo' => Json::class,
    ];

}
