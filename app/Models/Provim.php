<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\ProvimTrait;
use Illuminate\Database\Eloquent\Model;

class Provim extends Model
{
    use ModelTrait;
    use ProvimTrait;

    protected $fillable = ['sezoni', 'data_provim', 'ID_Lenda', 'ID_Kryetar', 'ID_Anetar_I', 'ID_Anetar_II'];

    public function flete_provim()
    {
        return $this->hasMany(Flete_Provim::class, 'ID_Provim');
    }

    public function lenda()
    {
        return $this->belongsTo(Lenda::class, 'ID_Lenda');
    }

    public function kryetar()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Kryetar');
    }

    public function anetar1()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Anetar_I');
    }

    public function anetar2()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Anetar_II');
    }
}
