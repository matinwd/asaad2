<?php

namespace App\Models;

use App\Traits\ObserversTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order.
 *
 * @package namespace App\Models;
 */
class Order extends Model
{

    use ObserversTrait;

    public static $faName = 'سفارش';

    public $statuses = [
        'در انتظار',
        'تایید شده',
        'رد شده',
        'ارسال شده'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'description',
        'status',
        'product_id'
    ];

    protected $appends = [
        'status_text','status_badge'
    ];

    public function getStatusTextAttribute()
    {
        if($this->status == 0)
            return 'در انتظار';
        elseif($this->status == 1)
            return  'تایید شده';
        elseif($this->status == 2)
            return  'رد شده';
        elseif($this->status == 3)
            return  'ارسال شده';
    }

    public function getStatusBadgeAttribute()
    {
        if($this->status == 0)
            return 'badge badge-pill badge-light-warning';
        elseif($this->status == 1)
            return  'badge badge-pill badge-light-success';
        elseif($this->status == 2)
            return  'badge badge-pill badge-light-danger';
        elseif($this->status == 3)
            return  'badge badge-pill badge-light-info';
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
