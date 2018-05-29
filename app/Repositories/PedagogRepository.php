<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Fakultet;
use App\Models\Pedagog;
use Yajra\DataTables\Facades\DataTables;

class PedagogRepository
{
    public function __construct(Pedagog $pedagog)
    {
        $this->pedagog = $pedagog;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->pedagog, $method), $args);
    }

    public function toArray()
    {

    }


    public function update($request, $id)
    {
        $user_data = $request->only(['email']);
        $pedagog_data = $request->only(['emer', 'mbiemer', 'titull']);
        $pedagog = $this->pedagog->find($id);
        $pedagog->update($pedagog_data);
        $pedagog->user()->update($user_data);
    }


    public function dataTable()
    {
        $pedagog = $this->pedagog->all();
        return DataTables::of($pedagog)
            ->addColumn('actions', function ($pedagog) {
                return $pedagog->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}