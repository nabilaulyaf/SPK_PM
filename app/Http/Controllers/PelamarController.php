<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPelamar;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamars = MasterPelamar::all();
        $pageName = 'Data Pelamar';
        return view('pelamar', compact('pelamars', 'pageName'));
    }

    public function create()
    {
        return view('pelamar_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelamar' => 'required|string|max:50',
            'no_hp' => 'required|string|max:12',
            'email' => 'required|email|max:50',
        ]);

        $lastPelamar = MasterPelamar::orderBy('id_pelamar', 'desc')->first();
        $newId = $lastPelamar ? $lastPelamar->id_pelamar + 1 : 1;

        MasterPelamar::create([
            'id_pelamar' => $newId,
            'nama_pelamar' => $request->input('nama_pelamar'),
            'no_hp' => $request->input('no_hp'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('pelamar.index')->with('success', 'Pelamar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelamar = MasterPelamar::findOrFail($id);
        return view('pelamar_edit', compact('pelamar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelamar' => 'required|string|max:50',
            'no_hp' => 'required|string|max:12',
            'email' => 'required|email|max:50',
        ]);

        $pelamar = MasterPelamar::findOrFail($id);
        $pelamar->update($request->all());
        return redirect()->route('pelamar.index')->with('success', 'Pelamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelamar = MasterPelamar::findOrFail($id);
        $pelamar->delete();
        return redirect()->route('pelamar.index')->with('success', 'Pelamar berhasil dihapus.');
    }
}
