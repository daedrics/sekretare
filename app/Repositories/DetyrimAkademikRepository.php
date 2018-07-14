<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/27/2018
 * Time: 3:45 PM
 */

namespace App\Repositories;

use App\Models\Detyrim_Akademik;
use Yajra\DataTables\Facades\DataTables;

class DetyrimAkademikRepository
{
    public function __construct(Detyrim_Akademik $detyrim_Akademik)
    {
        $this->detyrim_Akademik = $detyrim_Akademik;
    }

    public function __call($method, $args = array())
    {
        return call_user_func_array(array($this->detyrim_Akademik, $method), $args);
    }

    public function dataTable()
    {
        $detyrime = $this->detyrim_Akademik
            ->join('lendas', 'lendas.id', '=', 'detyrim_akademiks.ID_Lenda')
            ->join('students', 'students.id', '=', 'detyrim_akademiks.ID_Student')
            ->join('pedagogs', 'pedagogs.id', '=', 'detyrim_akademiks.ID_Pedagog')
            ->join('grup_mesimors', 'grup_mesimors.id', '=', 'students.ID_Grup_Mesimor')
            ->join('departaments', 'departaments.id', '=', 'grup_mesimors.ID_Departament')
            ->join('viti_akademiks', 'viti_akademiks.id', '=', 'grup_mesimors.ID_Viti_Akademik')
            ->groupBy('students.ID_Grup_Mesimor')
            ->groupBy('lendas.id')
            ->groupBy('pedagogs.id')
            ->select(['detyrim_akademiks.id', 'detyrim_akademiks.created_at', 'grup_mesimors.emer_G_M', 'departaments.emer_DEP', 'viti_akademiks.emer_V_A', 'lendas.emer AS emer_lende', 'pedagogs.emer', 'pedagogs.mbiemer'])
            ->get();


        return DataTables::of($detyrime)
            ->addColumn('actions', function ($detyrime) {
                return $detyrime->action_buttons;
            })
            ->addColumn('grupi_mesimor', function ($detyrime) {
                return $detyrime->emer_G_M
                    . ' ' . $detyrime->emer_DEP
                    . ' ' . $detyrime->emer_V_A;
            })
            ->addColumn('lenda', function ($detyrime) {
                return $detyrime->emer_lende;
            })
            ->addColumn('pedagogu', function ($detyrime) {
                return $detyrime->emer . ' ' . $detyrime->mbiemer;
            })
            ->rawColumns(['actions'])
            ->make(true);

        // return $detyrime;

    }


    public function detyrimeStudent($students)
    {
        $detyrime = $this->detyrim_Akademik->with(['student' => function ($query) {
            $query->with('flete_provim')->get();
        }])->whereIn('id', $students)->get();
        return $detyrime;
    }

    public function detyrimStudenti()
    {
        $detyrime = $this->detyrim_Akademik->where('ID_Student', auth()->user()->student->id)->get();
        return DataTables::of($detyrime)
            ->addColumn('lenda', function ($detyrime) {
                return $detyrime->lenda->emer;
            })
            ->addColumn('pedagog', function ($detyrime) {
                return $detyrime->pedagog->emer . ' ' . $detyrime->pedagog->mbiemer;
            })
            ->addColumn('ploteson', function ($detyrime) {
                return $detyrime->ploteson ? 'Ploteson detyrimin' : 'Nuk ploteson detyrimin';
            })
            ->addColumn('nota', function ($detyrime) {
                if ($detyrime->ploteson) {
                    $nota = $detyrime->lenda->provim[0]->flete_provim[0]->nota;
                    return $nota ? $nota : 'Nuk eshte vendosur ende nota!';
                } else {
                    return 'Nuk ploteson detyrimin';
                }
            })
            ->make(true);
    }

}