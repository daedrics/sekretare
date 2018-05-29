<?php

namespace App\Http\Controllers\Sekretare;

use App\Http\Requests\UserFormRequest;
use App\Models\Student;
use App\Repositories\GrupMesimorRepository;
use App\Repositories\StudentRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kamaln7\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    protected $studentRepository;
    protected $userRepository;
    protected $grupMesimorRepository;


    public function __construct(StudentRepository $studentRepository,
                                UserRepository $userRepository,
                                GrupMesimorRepository $grupMesimorRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->userRepository = $userRepository;
        $this->grupMesimorRepository = $grupMesimorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sekretare.student.index')
            ->with('grupe', $this->grupMesimorRepository->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserFormRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->userRepository->createStudent($request);
        Toastr::success('Studenti u krijua me sukses');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $student
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Student $student)
    {
        return view('sekretare.student.edit')
            ->with('student', $student)
            ->with('grupe', $this->grupMesimorRepository->toArray());
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
        $this->studentRepository->update($request, $id);
        Toastr::success('Studenti u perditesua me sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Student $student)
    {
        $student->user()->delete();
        return response()
            ->json([
                'message' => "Studenti u fshi me sukses!",
                'status' => 200
            ], 200);

    }

    public function dataTable()
    {
        return $this->studentRepository->dataTable();
    }
}
