<?php

namespace App\Http\Controllers\Pedagog;

use App\Models\Detyrim_Akademik;
use App\Repositories\DetyrimAkademikRepository;
use App\Repositories\GrupMesimorRepository;
use App\Repositories\LendaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetyrimeController extends Controller
{

    protected $lendaRepository;
    protected $grupMesimorRepository;
    protected $detyrimAkademikRepository;

    public function __construct(LendaRepository $lendaRepository,
                                GrupMesimorRepository $grupMesimorRepository,
                                DetyrimAkademikRepository $detyrimAkademikRepository)
    {
        $this->lendaRepository = $lendaRepository;
        $this->grupMesimorRepository = $grupMesimorRepository;
        $this->detyrimAkademikRepository = $detyrimAkademikRepository;
    }

    public function index()
    {
        return view('pedagog.detyrim.index')
            ->with('lende', $this->lendaRepository->toArray())
            ->with('grupe', $this->grupMesimorRepository->toArray());
    }

    public function search(Request $request)
    {
        $lenda = $this->lendaRepository->find($request->ID_Lenda);
        $grupi = $this->grupMesimorRepository->find($request->ID_Grup_Mesimor);

        $detyrime_array = $this->grupMesimorRepository->detyrimePedagog($request);
        $detyrime = $this->detyrimAkademikRepository->detyrimeStudent($detyrime_array);
        return redirect()->back()
            ->with('detyrime', $detyrime)
            ->with('lenda', $lenda)
            ->with('grupi', $grupi);
    }

    public function ploteso(Request $request, Detyrim_Akademik $detyrim)
    {
        $ploteson = $detyrim->ploteson ? 0 : 1;
        $detyrim->update(['ploteson' => $ploteson]);

        return response()
            ->json([
                'message' => "Detyrimi u perditesua!",
                'status' => 200
            ], 200);
    }
}
