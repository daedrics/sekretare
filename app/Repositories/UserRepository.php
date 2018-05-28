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

    public function create($request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $this->user->create($data);
    }

    public function dataTable()
    {
        $users = $this->user->where('role', '!=', 'sekretare')->get();
        return DataTables::of($users)->make(true);
    }

}