<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function grup_mesimor()
    {
        return $this->belongsTo(Grup_Mesimor::class, 'ID_Grup_Mesimor');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User');
    }

    public function detyrim_akademik()
    {
        return $this->hasMany(Detyrim_Akademik::class, 'ID_Student');
    }

    public function flete_provim()
    {
        return $this->hasMany(Flete_Provim::class, 'ID_Student');
    }
}
