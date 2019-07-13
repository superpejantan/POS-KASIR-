<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class user_poliumum extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user_poliumum';
    protected $table = 'user_poliumum';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
{
    //
}
