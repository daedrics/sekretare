<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flete_Provim extends Model
{
    protected $fillable = ['ID_Provim','ID_Student','nota'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'ID_Student');
    }

    public function provim()
    {
        return $this->belongsTo(Provim::class, 'ID_Provim');
    }
}
