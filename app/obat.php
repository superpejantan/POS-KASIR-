<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    protected $table= "tb_obat";
    
    public function pasien()
    {
        return $this->belongsToMany('App\tb_pasien');
    }
}

