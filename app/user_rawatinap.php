<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class user_rawatinap extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user_rawatinap';
    protected $table = 'user_rawatinap';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
