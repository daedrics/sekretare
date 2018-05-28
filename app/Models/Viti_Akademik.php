<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viti_Akademik extends Model
{

    public function grup_mesimor()
    {
        return $this->hasMany(Grup_Mesimor::class, 'ID_Viti_Akademik');
    }

}
