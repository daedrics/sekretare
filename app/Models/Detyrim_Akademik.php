<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detyrim_Akademik extends Model
{

    public function lenda()
    {
        return $this->belongsTo(Lenda::class, 'ID_Lenda');
    }

    public function pedagog()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Pedagog');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'ID_Student');
    }
}
