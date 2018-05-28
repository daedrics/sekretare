<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\FakultetTrait;
use Illuminate\Database\Eloquent\Model;

class Fakultet extends Model
{
    use ModelTrait;
    use FakultetTrait;

    protected $fillable = ['emer_FAKUL', 'ID_Universitet'];

    public function universitet()
    {
        return $this->belongsTo(Universitet::class, 'ID_Universitet');
    }

    public function departamente()
    {
        return $this->hasMany(Departament::class, 'ID_Fakultet');
    }
}
