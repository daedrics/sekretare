<?php

namespace App\Http\Controllers\Pedagog;

use App\Models\Flete_Provim;
use App\Repositories\DetyrimAkademikRepository;
use App\Repositories\GrupMesimorRepository;
use App\Repositories\LendaRepository;
use App\Repositories\ProvimRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProvimController extends Controller
{

    protected $lendaRepository;
    protected $grupMesimorRepository;
    protected $detyrimAkademikRepository;
    protected $provimRepository;

    public function __construct(LendaRepository $lendaRepository,
                                GrupMesimorRepository $grupMesimorRepository,
                                DetyrimAkademikRepository $detyrimAkademikRepository,
                                ProvimRepository $provimRepository)
    {
        $this->lendaRepository = $lendaRepository;
        $this->grupMesimorRepository = $grupMesimorRepository;
        $this->detyrimAkademikRepository = $detyrimAkademikRepository;
        $this->provimRepository = $provimRepository;
    }

    public function index()
    {
        return view('pedagog.provim.index')
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

    public function nota(Request $request, $student)
    {
        $lenda = $request->lenda;
        $provim = $this->provimRepository->where('ID_Lenda', $lenda)->first();
        $fleteProvim = Flete_Provim::where('ID_Provim', $provim->id)
            ->where('ID_Student', $student)->first();
        $fleteProvim->update(['nota' => $request->nota]);

        return response()
            ->json([
                'message' => "Nota u vendos!",
                'status' => 200
            ], 200);
    }


}
