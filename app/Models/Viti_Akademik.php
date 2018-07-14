<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viti_Akademik extends Model
{

    protected $table = 'viti_akademiks';
    protected $fillable = ['emer_V_A'];

    public function grup_mesimor()
    {
        return $this->hasMany(Grup_Mesimor::class, 'ID_Viti_Akademik');
    }

}
