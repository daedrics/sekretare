<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Departament;
use Yajra\DataTables\Facades\DataTables;

class DepartamentRepository
{
    public function __construct(Departament $departament)
    {
        $this->departament = $departament;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->departament, $method), $args);
    }

    public function dataTable()
    {
        $departamente = $this->departament->all();
        return DataTables::of($departamente)
            ->addColumn('actions', function ($departamente) {
                return $departamente->action_buttons;
            })
            ->addColumn('fakulteti', function ($departamente) {
                return $departamente->fakultet->emer_FAKUL;
            })
            ->addColumn('universiteti', function ($departamente) {
                return $departamente->fakultet->universitet->emer_UNI;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}