<?php

namespace App\Models;

use App\Events\AdminMadeChange;
use App\Traits\ObserversTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use ObserversTrait;
    protected $fillable = ['name','email','subject','message'];

    public static $faName = 'درخواست تماس';


    public static function boot()
    {
        parent::boot();

        self::created(function (self $contactRequest){
            event(new AdminMadeChange(
                [
                    'title' => "درخواست تماس",
                    'description' => "درخواست تماس جدیدی ثبت شد توسط $contactRequest->name",
                    'user_id' => auth()->id()
                ]
            ));
        });
    }
}
