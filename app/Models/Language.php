<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $casts = ['active' => 'bool'];
    protected $fillable = ['name','code','direction','active'];

    public function getFlagAttribute()
    {
        return config('translatable.flags.' . $this->code, 'ir');
    }


    /**
     * Scope a query to only include active languages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
