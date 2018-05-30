<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Provim;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class ProvimRepository
{
    public function __construct(Provim $provim)
    {
        $this->provim = $provim;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->provim, $method), $args);
    }

    public function create($request)
    {
        $kryetar = $request->ID_Kryetar;
        $anetarI = $request->ID_Anetar_I;
        $anetarII = $request->ID_Anetar_II;
        if ($kryetar == $anetarI || $kryetar == $anetarII || $anetarI == $anetarII) {
            return false;
        }
        $this->provim->create($request->all());
        return true;
    }

    public function dataTable()
    {
        $provime = $this->provim->all();
        return DataTables::of($provime)
            ->addColumn('actions', function ($provime) {
                return $provime->action_buttons;
            })
            ->addColumn('lenda', function ($provime) {
                return $provime->lenda->emer;
            })
            ->addColumn('kryetar', function ($provime) {
                return $provime->kryetar->emer . ' ' . $provime->kryetar->mbiemer;
            })
            ->addColumn('anetarI', function ($provime) {
                return $provime->anetar1->emer . ' ' . $provime->anetar1->mbiemer;
            })
            ->addColumn('anetarII', function ($provime) {
                return $provime->anetar2->emer . ' ' . $provime->anetar2->mbiemer;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}