<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Models\Pedagog;
use App\Repositories\PedagogRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class PedagogController extends Controller
{
    protected $userRepository;
    protected $pedagogRepository;


    public function __construct(UserRepository $userRepository,
                                PedagogRepository $pedagogRepository)
    {
        $this->userRepository = $userRepository;
        $this->pedagogRepository = $pedagogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekretare.pedagog.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userRepository->createPedagog($request);
        Toastr::success('Pedagogu u krijua me sukses');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Pedagog $pedagog
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Pedagog $pedagog)
    {
        return view('sekretare.pedagog.edit')
            ->with('pedagog', $pedagog);
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
        $this->pedagogRepository->update($request, $id);
        Toastr::success('Pedagogu u perditesua me sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pedagog $pedagog
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Pedagog $pedagog)
    {
        $pedagog->user()->delete();
        return response()
            ->json([
                'message' => "Pedagogu u fshi me sukses!",
                'status' => 200
            ], 200);
    }

    public function dataTable()
    {
        return $this->pedagogRepository->dataTable();
    }
}
