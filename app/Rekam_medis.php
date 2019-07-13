<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekam_medis extends Model
{
    protected $table = "tb_rekam_mds";
    public $primary = "id_rm";
    public $timestamps = true;

    public function poli()
    {
        return $this->belongsTo('App\Poli','id_poli','id_poli');
    }
   
}
