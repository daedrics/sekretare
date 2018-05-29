<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Lenda;
use Yajra\DataTables\Facades\DataTables;

class LendaRepository
{
    public function __construct(Lenda $lenda)
    {
        $this->lenda = $lenda;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->lenda, $method), $args);
    }

    public function toArray()
    {
        $lende = $this->lenda->all()
            ->pluck('emer', 'id')
            ->toArray();
        return $lende;
    }

    public function dataTable()
    {
        $lende = $this->lenda->all();
        return DataTables::of($lende)
            ->addColumn('actions', function ($lende) {
                return $lende->action_buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}