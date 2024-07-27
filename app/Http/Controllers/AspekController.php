<?php

namespace App\Http\Controllers;

use App\Models\PmAspek;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    public function index()
    {
        $aspek = PmAspek::orderBy('id_aspek', 'asc')->get();
        $pageName = 'Aspek Penilaian';
        return view('aspek', compact('aspek', 'pageName'));
    }
}
