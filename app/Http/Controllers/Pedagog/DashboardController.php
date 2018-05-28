<?php

namespace App\Http\Controllers\Pedagog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pedagog.dashboard');
    }
}
