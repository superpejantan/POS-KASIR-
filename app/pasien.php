<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = "tb_pasien";
    public $primary = "id_pasien";
    public $timestamps = false;

    
    public function n_obat()
    {
        return $this->belongsToMany('App\obat');
    }
   public function pasien()
   {
       return $this->belongsTo('App\rm_obat','id_pasien','pasien');
   }
}

