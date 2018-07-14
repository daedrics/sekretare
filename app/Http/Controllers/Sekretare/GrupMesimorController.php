<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Models\Grup_Mesimor;
use App\Repositories\DepartamentRepository;
use App\Repositories\GrupMesimorRepository;
use App\Repositories\VitAkademikRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class GrupMesimorController extends Controller
{
    protected $grupMesimorRepository;
    protected $departamentRepository;
    protected $vitAkademikRepository;


    public function __construct(GrupMesimorRepository $grupMesimorRepository,
                                DepartamentRepository $departamentRepository,
                                VitAkademikRepository $vitAkademikRepository)
    {
        $this->grupMesimorRepository = $grupMesimorRepository;
        $this->departamentRepository = $departamentRepository;
        $this->vitAkademikRepository = $vitAkademikRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamente = $this->departamentRepository->toArray();
        $vite = $this->vitAkademikRepository->toArray();
        return view('sekretare.grupMesimor.index')
            ->with('departamente', $departamente)
            ->with('vite', $vite);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->grupMesimorRepository->create($request->all());
        Toastr::success('Grupi mesimor u krijua me sukses!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Grup_Mesimor $grupMesimor)
    {
        $departamente = $this->departamentRepository->toArray();
        $vite = $this->vitAkademikRepository->toArray();

        return view('sekretare.grupMesimor.edit')
            ->with('departamente', $departamente)
            ->with('vite', $vite)
            ->with('grupMesimor', $grupMesimor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Grup_Mesimor $grup_Mesimor
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Grup_Mesimor $grupMesimor)
    {
        $grupMesimor->update($request->all());
        Toastr::success('Grupi mesimor u perditesua me sukses!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Grup_Mesimor $grup_Mesimor
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Grup_Mesimor $grupMesimor)
    {
        $grupMesimor->delete();
        return response()
            ->json([
                'message' => "Grupi mesimor u fshi me sukses!",
                'status' => 200
            ], 200);
    }

    public function dataTable()
    {
        return $this->grupMesimorRepository->dataTable();
    }
}
