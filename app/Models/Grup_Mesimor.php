<?php

namespace App\Models;

use App\Traits\GrupMesimorTrait;
use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Model;

class Grup_Mesimor extends Model
{

    use ModelTrait;
    use GrupMesimorTrait;

    protected $fillable = ['emer_G_M', 'ID_Departament', 'ID_Viti_Akademik'];
    protected $table = 'grup_mesimors';

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


//    public function detyrim_akademik()
//    {
//        return $this->hasManyThrough(Detyrim_Akademik::class, Student::class,
//            'ID_Grup_Mesimor',
//            'ID_Student',
//            'id',
//            'id');
//    }
}
