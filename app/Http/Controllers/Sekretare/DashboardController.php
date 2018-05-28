<?php

namespace App\Http\Controllers\Sekretare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('sekretare.dashboard');
    }
}
