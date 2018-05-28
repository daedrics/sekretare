<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Student;
use Yajra\DataTables\Facades\DataTables;

class StudentRepository
{
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->student, $method), $args);
    }

}