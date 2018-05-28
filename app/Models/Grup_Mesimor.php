<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup_Mesimor extends Model
{


    public function departament()
    {
        return $this->belongsTo(Departament::class, 'ID_Departament');
    }

    public function vit_akademik()
    {
        return $this->belongsTo(Viti_Akademik::class, 'ID_Viti_Akademik');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'ID_Grup_Mesimor');
    }
}
