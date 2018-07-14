<?php

namespace App\Models;

use App\Traits\LendaTrait;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Lenda extends Model
{
    use ModelTrait;
    use LendaTrait;

    protected $fillable = ['emer', 'numer_leksione', 'numer_seminar', 'numer_lab', 'detyre_kursi', 'kredite'];

    public function detyrim_akademik()
    {
        return $this->hasMany(Detyrim_Akademik::class, 'ID_Lenda');
    }

    public function provim()
    {
        return $this->hasMany(Provim::class, 'ID_Lenda');
    }
}
