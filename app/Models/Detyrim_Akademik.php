<?php

namespace App\Models;


use App\Traits\ModelTrait;
use App\Traits\DetyrimAkademikTrait;
use Illuminate\Database\Eloquent\Model;

class Detyrim_Akademik extends Model
{

    use ModelTrait;
    use DetyrimAkademikTrait;


    protected $fillable = ['ID_Lenda', 'ID_Pedagog', 'ID_Student', 'ploteson'];
    protected $table = 'detyrim_akademiks';

    public function lenda()
    {
        return $this->belongsTo(Lenda::class, 'ID_Lenda');
    }

    public function pedagog()
    {
        return $this->belongsTo(Pedagog::class, 'ID_Pedagog');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'ID_Student');
    }
}
