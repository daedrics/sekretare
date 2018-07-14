<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Repositories\UserRepository;
use App\Repositories\VitAkademikRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class VitAkademikController extends Controller
{
    protected $vitAkademikRepository;


    public function __construct(VitAkademikRepository $vitAkademikRepository)
    {
        $this->vitAkademikRepository = $vitAkademikRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->vitAkademikRepository->create($request->all());
        Toastr::success('Viti akademik u krijua me sukses');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    }
}
