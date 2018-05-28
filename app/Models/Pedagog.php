<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pedagog extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'ID_User');
    }

    public function detyrim_akademik()
    {
        return $this->hasMany(Detyrim_Akademik::class, 'ID_Pedagog');
    }

    public function provim_kryetar()
    {
        return $this->hasMany(Provim::class, 'ID_Kryetar');
    }

    public function provim_anetar1()
    {
        return $this->hasMany(Provim::class, 'ID_Anetar_I');
    }

    public function provim_anetar2()
    {
        return $this->hasMany(Provim::class, 'ID_Anetar_II');
    }

}
