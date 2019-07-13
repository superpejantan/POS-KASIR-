<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user_farmasi extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user_farmasi';
    protected $table = 'user_farmasi';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
