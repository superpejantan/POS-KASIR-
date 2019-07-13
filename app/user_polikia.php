<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user_polikia extends Authenticatable
{
    use Notifiable;

    protected $guard = "user_polikia";
    protected $table ="user_polikia";
    
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
