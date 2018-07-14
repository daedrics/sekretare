<?php

namespace App\Http\Controllers\Pedagog;

use App\Models\Detyrim_Akademik;
use App\Models\Flete_Provim;
use App\Repositories\DetyrimAkademikRepository;
use App\Repositories\GrupMesimorRepository;
use App\Repositories\LendaRepository;
use App\Repositories\ProvimRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetyrimeController extends Controller
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

    public function ploteso(Detyrim_Akademik $detyrim)
    {
        $provim = $this->provimRepository->where('ID_Lenda', $detyrim->ID_Lenda)->first();
        if ($provim) {
            $ploteson = $detyrim->ploteson ? 0 : 1;
            $detyrim->update(['ploteson' => $ploteson]);
            $provim_id = $provim->id;
            if ($ploteson) {
                Flete_Provim::create(['ID_Student' => $detyrim->ID_Student, 'ID_Provim' => $provim_id]);
            } else {
                $flete_provim = Flete_Provim::where('ID_Student', $detyrim->ID_Student)->first();
                $flete_provim->delete();
            }

            return response()
                ->json([
                    'message' => "Detyrimi u perditesua!",
                    'status' => 200
                ], 200);
        } else {
            return response()
                ->json([
                    'message' => "Per kete lende nuk ekziston ende provimi!",
                    'status' => 200
                ], 500);
        }


    }
}
