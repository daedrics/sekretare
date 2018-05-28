<?php

namespace App;

use App\Models\Pedagog;
use App\Models\Student;
use App\Traits\UserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use UserTrait;

    protected $fillable = ['email', 'password', 'role'];

    public function student()
    {
        return $this->hasOne(Student::class, 'ID_User');
    }

    public function pedagog()
    {
        return $this->hasOne(Pedagog::class, 'ID_User');
    }

}
