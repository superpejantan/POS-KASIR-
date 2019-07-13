<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    protected $table = "tb_ruangan";
    public $primary = "id_ruangan";
    public $timestamps = false;

}

