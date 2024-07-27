<?php

namespace App\Http\Controllers;

use App\Models\PmFaktor;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = PmFaktor::all();
        $pageName = 'Kriteria Penilaian';
        return view('kriteria', compact('kriteria', 'pageName'));
    }
}
