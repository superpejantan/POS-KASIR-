<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rawat_inap extends Model
{
    protected $table ="tb_pasien_inap";
    public $primary = "id_rawat_inap";
    public $timestamps = false;


    public function ruang()
    {
        return $this->belongsTo('App\ruangan','id_ruangan','id_ruangan');
       
    }

}
