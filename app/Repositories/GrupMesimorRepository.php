<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Grup_Mesimor;
use Illuminate\Support\Collection;
use Yajra\DataTables\Facades\DataTables;

class GrupMesimorRepository
{
    public function __construct(Grup_Mesimor $grup_Mesimor)
    {
        $this->grup_mesimor = $grup_Mesimor;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->grup_mesimor, $method), $args);
    }

    public function toArray()
    {
        $array = Collection::make();
        $grupe = $this->grup_mesimor->all();
        foreach ($grupe as $grup) {
            $array->put($grup->id, $grup->emer_G_M . ' ' . $grup->departament->emer_DEP . ' '. $grup->vit_akademik->emer_V_A);
        }
        return $array->toArray();
    }

    public function dataTable()
    {
        $grupe = $this->grup_mesimor->all();
        return DataTables::of($grupe)
            ->addColumn('actions', function ($grupe) {
                return $grupe->action_buttons;
            })
            ->addColumn('departamenti', function ($grupe) {
                return $grupe->departament->emer_DEP;
            })
            ->addColumn('vit_akademik', function ($grupe) {
                return $grupe->vit_akademik->emer_V_A;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}