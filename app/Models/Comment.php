<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Models\Casts\Json;
use App\Traits\ObserversTrait;
use App\Utils\JsonExtraField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Comment extends Model
{
    use JsonExtraField,ObserversTrait;

    protected $appends = [
        'visibility_status_text',
        'pictures','banner'
    ];

    public static $faName = 'نظر';


    protected $casts = [
        'options' => Json::class
    ];

    protected $fillable = [
        'user_id',
        'description',
        'parent_id',
        'name',
        'post_id',
        'visibility',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getFirstImageAttribute()
    {
        return 'storage/' . $this->images[0];
    }


    public function getVisibilityStatusTextAttribute()
    {
        if($this->visibility == 0){
            return 'غیرقابل نمایش';
        }
        else {
            return 'منتشر شده';
        }

    }

    public static function boot()
    {
        parent::boot();

        self::created(function (self $comment){
            event(new AdminMadeChange(
                [
                    'title' => "ساخت نظر $comment->name",
                    'description' => auth()->user()?->name  . ' نظر جدیدی وارد سیستم کرد.',
                    'user_id' => auth()->id()
                ]
            ));
        });

        self::addGlobalScope('visible',function(Builder $builder){
            $builder->where('visibility',1);
        });

    }



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


    public function children()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }
}
