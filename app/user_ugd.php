<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user_ugd extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user_ugd';
    protected $table = 'user_ugd';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
