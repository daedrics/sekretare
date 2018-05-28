<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provim extends Model
{

    public function flete_provim()
    {
        return $this->hasMany(Flete_Provim::class, 'ID_Provim');
    }

    public function lenda()
    {
        return $this->belongsTo(Lenda::class, 'ID_Lenda');
    }

    public function kryetar()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Kryetar');
    }

    public function anetar1()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Anetar_I');
    }

    public function anetar2()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Anetar_II');
    }
}
