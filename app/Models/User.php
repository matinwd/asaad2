<?php

namespace App\Models;

use App\Traits\ObserversTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use ObserversTrait;
    public static $faName = 'کاربر';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
