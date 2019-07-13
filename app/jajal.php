<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jajal extends Model
{
    protected $table = "tb_pasien";
   

    public function obat()
    {
        return $this->hasOne('App\obat');
    }
}
