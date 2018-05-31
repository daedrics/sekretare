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
        $grupe = $this->grup_mesimor->with(['departament', 'vit_akademik'])->get();
        foreach ($grupe as $grup) {
            $array->put($grup->id, $grup->emer_G_M . ' ' . $grup->departament->emer_DEP . ' ' . $grup->vit_akademik->emer_V_A);
        }
        return $array->toArray();
    }

    public function dataTable()
    {
        $grupe = $this->grup_mesimor->with(['departament', 'vit_akademik'])->get();
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


    public function storeDetyrim($request)
    {
        $students = $this->grup_mesimor->find($request->grup_mesimor)->student;

        if ($students->count() == 0) {
            return false;
        }

        foreach ($students as $student) {
            $student->detyrim_akademik()->create([
                'ID_Pedagog' => $request->ID_Pedagog,
                'ID_Lenda' => $request->ID_Lenda,
                'ploteson' => 0]);
        }

        return true;
    }

    public function validateDetyrim($request)
    {
        $grupe = $this->grup_mesimor
            ->join('students', 'students.ID_Grup_Mesimor', '=', 'grup_mesimors.id')
            ->join('detyrim__akademiks', 'detyrim__akademiks.ID_Student', '=', 'students.id')
            ->where('grup_mesimors.id', $request->grup_mesimor)
            ->where('detyrim__akademiks.ID_Lenda', $request->ID_Lenda)
            ->where('detyrim__akademiks.ID_Pedagog', $request->ID_Pedagog)->get();

        return $grupe->count() == 0;
    }


}