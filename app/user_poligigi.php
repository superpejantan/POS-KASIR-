<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user_poligigi extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user_poligigi';
    protected $table = 'user_poligigi';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
