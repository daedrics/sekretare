<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Repositories\DetyrimAkademikRepository;
use App\Repositories\GrupMesimorRepository;
use App\Repositories\LendaRepository;
use App\Repositories\PedagogRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class DetyrimAkademikController extends Controller
{

    protected $grupMesimorRepository;
    protected $pedagogRepository;
    protected $lendaRepository;
    protected $detyrimAkademikRepository;

    public function __construct(GrupMesimorRepository $grupMesimorRepository,
                                PedagogRepository $pedagogRepository,
                                LendaRepository $lendaRepository,
                                DetyrimAkademikRepository $detyrimAkademikRepository)
    {
        $this->grupMesimorRepository = $grupMesimorRepository;
        $this->pedagogRepository = $pedagogRepository;
        $this->lendaRepository = $lendaRepository;
        $this->detyrimAkademikRepository = $detyrimAkademikRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekretare.detyrimAkademik.index')
            ->with('lende', $this->lendaRepository->toArray())
            ->with('pedagog', $this->pedagogRepository->toArray())
            ->with('grup_mesimor', $this->grupMesimorRepository->toArray());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$this->grupMesimorRepository->validateDetyrim($request)) {
            Toastr::error('Ky detyrim akademik ekziston!');
            return redirect()->back();
        }

        if ($this->grupMesimorRepository->storeDetyrim($request)) {
            Toastr::success('Detyrimi akademik u krijua me sukses!');
            return redirect()->back();
        }

        Toastr::error('Grupi Mesimor i zgjedhur nuk ka studente!');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable()
    {
        return $this->detyrimAkademikRepository->dataTable();
    }
}
