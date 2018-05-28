<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitet extends Model
{

    public function fakultete()
    {
        return $this->hasMany(Fakultet::class, 'ID_Universitet');
    }

}
