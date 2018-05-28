<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{

    public function fakultet()
    {
        return $this->belongsTo(Fakultet::class, 'ID_Fakultet');
    }

    public function grup_mesimor()
    {
        return $this->hasMany(Grup_Mesimor::class,'ID_Departament');
    }

}
