<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Fakultet;
use Yajra\DataTables\Facades\DataTables;

class FakultetRepository
{
    public function __construct(Fakultet $fakultet)
    {
        $this->fakultet = $fakultet;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->fakultet, $method), $args);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['ID_Universitet'] = 1;
        $this->create($data);
    }

    public function dataTable()
    {
        $fakultete = $this->fakultet->with('universitet')->get();
        return DataTables::of($fakultete)
            ->addColumn('actions',function ($fakultete){
                return $fakultete->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}