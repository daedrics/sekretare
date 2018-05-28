<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flete_Provim extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'ID_Student');
    }

    public function provim()
    {
        return $this->belongsTo(Provim::class, 'ID_Provim');
    }
}
