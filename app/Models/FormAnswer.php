<?php

namespace App\Models;

use App\Models\Casts\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormAnswer extends Model
{
    protected $fillable = [
        'ip', 'user_agent', 'data'
    ];

    protected $casts = [
        'data' => Json::class,
    ];

    protected $appends = ['files'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function getDataAttribute($value)
    {
        return collect(json_decode($value, true))->map(function ($item) {
            return is_array($item) ? implode(' , ', $item) : $item;
        })->toArray();
    }

    public function getFilesAttribute()
    {
        $files = [];
        $basePath = "files/shares/form_builder_data/form-{$this->form_id}";

        foreach ($this->data ?? [] as $index => $item) {
            if (Str::contains($item, 'file') && Storage::disk('lfm')->exists("{$basePath}/{$item}"))
                $files[$index] = Storage::disk('lfm')->url("{$basePath}/{$item}");
        }

        return $files;
    }
}
