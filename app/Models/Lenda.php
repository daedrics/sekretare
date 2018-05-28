<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lenda extends Model
{

    public function detyrim_akademik()
    {
        return $this->hasMany(Detyrim_Akademik::class, 'ID_Lenda');
    }

    public function provim()
    {
        return $this->hasMany(Provim::class, 'ID_Lenda');
    }
}
