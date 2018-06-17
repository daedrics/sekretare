<?php

namespace App\Http\Controllers\Student;

use App\Repositories\DetyrimAkademikRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    protected $detyrimAkademikRepository;

    public function __construct(DetyrimAkademikRepository $detyrimAkademikRepository)
    {
        $this->detyrimAkademikRepository = $detyrimAkademikRepository;
    }

    public function index()
    {
        $student = auth()->user()->student;
        return view('student.dashboard')
            ->with('student', $student);
    }

    public function dataTable()
    {
        return $this->detyrimAkademikRepository->detyrimStudenti();
    }
}
