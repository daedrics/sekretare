<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\User;
use Yajra\DataTables\Facades\DataTables;

class UserRepository
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->user, $method), $args);
    }

    public function createStudent($request)
    {
        $user_data = $request->only(['email', 'password']);
        $user_data['password'] = bcrypt($user_data['password']);
        $user_data['role'] = 'student';
        $student_data = $request->only(['emer', 'mbiemer', 'ditelindje', 'data_regjistrim', 'ID_Grup_Mesimor']);
        $user = $this->user->create($user_data);
        $user->student()->create($student_data);
    }

    public function dataTable()
    {
        $users = $this->user->where('role', '!=', 'sekretare')->get();
        return DataTables::of($users)->make(true);
    }

}