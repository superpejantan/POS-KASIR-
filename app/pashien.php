<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pashien extends Model
{
    protected $table = "tb_patient";
    public $primary = "id_pasien";
    public $timestamps = false; 
}
