<?php

namespace App\Traits;

use App\Events\AdminMadeChange;

trait ObserversTrait{
    public static function boot()
    {
        parent::boot();

        $hooks = [
            'ویرایش' =>'updated',
            'حذف' =>'deleted',
            'ساخت' =>'created'
        ];

        foreach ($hooks ?? [] as $index => $hook){
            self::$hook(function (self $item) use ($hook,$index){

                // If item does not have name, use it's id
                $identifier = $item->name ?? $item->id;

                $user = auth()?->user();

                    event(new AdminMadeChange(
                    [
                        'title' => $index . " " . static::$faName . "($identifier)",
                        'description' => $index . " " . static::$faName . " توسط " . ($user->name ?? 'کاربر مهمان') . "  انجام شد",
                        'user_id' => $user?->id
                    ]
                ));
            });
        }
    }
}