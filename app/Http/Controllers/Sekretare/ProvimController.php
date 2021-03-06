<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Models\Flete_Provim;
use App\Models\Provim;
use App\Repositories\LendaRepository;
use App\Repositories\PedagogRepository;
use App\Repositories\ProvimRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class ProvimController extends Controller
{
    protected $provimRepository;
    protected $lendaRepository;
    protected $pedagogRepository;


    public function __construct(ProvimRepository $provimRepository,
                                LendaRepository $lendaRepository,
                                PedagogRepository $pedagogRepository)
    {
        $this->provimRepository = $provimRepository;
        $this->lendaRepository = $lendaRepository;
        $this->pedagogRepository = $pedagogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekretare.provim.index')
            ->with('lende', $this->lendaRepository->toArray())
            ->with('pedagog', $this->pedagogRepository->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->provimRepository->create($request)) {
            Toastr::success('Provimi u krijua me sukses');
            return redirect()->back();
        }
        return redirect()->back()->withFlashDanger('Anetaret e komisionit duhet te jene te ndryshem!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provim $provim)
    {
        return view('sekretare.provim.edit')
            ->with('provim', $provim)
            ->with('lende', $this->lendaRepository->toArray())
            ->with('pedagog', $this->pedagogRepository->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Provim $provim
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Provim $provim)
    {
        $provim->update($request->all());
        Toastr::success('Provimi u perditesua me sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provim $provim)
    {
        $provim->delete();
        return response()
            ->json([
                'message' => "Provimi u fshi me sukses!",
                'status' => 200
            ], 200);
    }

    public function dataTable()
    {
        return $this->provimRepository->dataTable();
    }

    public function show($provim)
    {
        $flete_provim = Flete_Provim::where('ID_Provim', $provim)->with('student')->get();
        $provim = $this->provimRepository->find($provim);
        $flag = true;

        foreach ($flete_provim as $flete) {
            if ($flete->nota == null) {
                $flag = false;
                break;
            }
        }
        if (!$flag) {
            return redirect()->back()->withFlashDanger('Per kete provim nuk jane vendosur te gjitha notat!');
        }


        return view('sekretare.provim.show')
            ->with('flete', $flete_provim)
            ->with('provim', $provim);
    }
}
