<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Models\Departament;
use App\Models\Fakultet;
use App\Repositories\DepartamentRepository;
use App\Repositories\FakultetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class DepartamentController extends Controller
{
    protected $departamentRepository;
    protected $fakultetRepository;


    public function __construct(DepartamentRepository $departamentRepository,
                                FakultetRepository $fakultetRepository)
    {
        $this->departamentRepository = $departamentRepository;
        $this->fakultetRepository = $fakultetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekretare.departament.index')
            ->with('fakultete', $this->fakultetRepository->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->departamentRepository->create($request->all());
        Toastr::success('Departamenti u krijua me sukses!');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Departament $departament)
    {
        return view('sekretare.departament.edit')
            ->with('departament', $departament)
            ->with('fakultete', $this->fakultetRepository->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departament $departament)
    {
        $departament->update($request->all());
        Toastr::success('Departamenti u perditesua me sukses!');
        return redirect()->back();
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
        return $this->departamentRepository->dataTable();
    }
}
