<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Models\Fakultet;
use App\Repositories\FakultetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

/**
 * Class FakultetController
 * @package App\Http\Controllers\Sekretare
 */
class FakultetController extends Controller
{
    protected $fakultetRepository;


    /**
     * FakultetController constructor.
     * @param FakultetRepository $fakultetRepository
     */
    public function __construct(FakultetRepository $fakultetRepository)
    {
        $this->fakultetRepository = $fakultetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekretare.fakultet.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->fakultetRepository->store($request);
        Toastr::success('Fakulteti u krijua me sukses!');
        return redirect()->back();
    }

    public function edit(Fakultet $fakultet)
    {
        return view('sekretare.fakultet.edit')
            ->with('fakultet', $fakultet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Fakultet $fakultet
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Fakultet $fakultet)
    {
        $fakultet->update($request->all());
        Toastr::success('Fakulteti u perditesua me sukses!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Fakultet $fakultet
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Fakultet $fakultet)
    {
        $fakultet->delete();
        return response()
            ->json([
                'message' => "Fakulteti u fshi me sukses!",
                'status' => 200
            ], 200);
    }

    public function dataTable()
    {
        return $this->fakultetRepository->dataTable();
    }
}
