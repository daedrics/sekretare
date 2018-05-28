<?php

namespace App\Models;

use App\Traits\DepartamentTrait;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use ModelTrait;
    use DepartamentTrait;

    protected $fillable = ['emer_DEP', 'ID_Fakultet'];

    public function fakultet()
    {
        return $this->belongsTo(Fakultet::class, 'ID_Fakultet');
    }

    public function grup_mesimor()
    {
        return $this->hasMany(Grup_Mesimor::class,'ID_Departament');
    }

}
