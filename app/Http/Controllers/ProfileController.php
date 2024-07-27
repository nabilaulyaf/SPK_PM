<?php

namespace App\Http\Controllers;

use App\Models\PmSample;
use Illuminate\Http\Request;
use App\Models\MasterPelamar;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{    
    public function index()
    {
        $pelamar = DB::table('master_pelamar')
            ->leftJoin(DB::raw('(SELECT id_pelamar, 
                                SUM(CASE WHEN id_faktor = 1 THEN value ELSE 0 END) AS A1, 
                                SUM(CASE WHEN id_faktor = 2 THEN value ELSE 0 END) AS A2, 
                                SUM(CASE WHEN id_faktor = 3 THEN value ELSE 0 END) AS A3, 
                                SUM(CASE WHEN id_faktor = 4 THEN value ELSE 0 END) AS A4, 
                                SUM(CASE WHEN id_faktor = 5 THEN value ELSE 0 END) AS A5,
                                SUM(CASE WHEN id_faktor = 6 THEN value ELSE 0 END) AS A6,
                                SUM(CASE WHEN id_faktor = 7 THEN value ELSE 0 END) AS A7,
                                SUM(CASE WHEN id_faktor = 8 THEN value ELSE 0 END) AS A8,
                                SUM(CASE WHEN id_faktor = 9 THEN value ELSE 0 END) AS A9,
                                SUM(CASE WHEN id_faktor = 10 THEN value ELSE 0 END) AS A10,
                                SUM(CASE WHEN id_faktor = 11 THEN value ELSE 0 END) AS A11,
                                SUM(CASE WHEN id_faktor = 12 THEN value ELSE 0 END) AS A12
                                FROM pm_sample 
                                GROUP BY id_pelamar) AS pm'), 
                    'master_pelamar.id_pelamar', '=', 'pm.id_pelamar')
            ->select('master_pelamar.id_pelamar', 'master_pelamar.nama_pelamar', 
                     'pm.A1', 'pm.A2', 'pm.A3', 'pm.A4',
                     'pm.A5', 'pm.A6', 'pm.A7', 'pm.A8',
                     'pm.A9', 'pm.A10', 'pm.A11', 'pm.A12')
            ->get();
        
        $pageName = 'Profile Matching';

        return view('profile', compact('pelamar', 'pageName'));
    }

    public function save(Request $request)
    {
        $factors = [];
        $message = '';

        // Determine which button was clicked and set factors and message accordingly
        if ($request->has('Simpan_kecerdasan')) {
            $factors = [1, 2, 3, 4];
            $message = 'Data kecerdasan berhasil disimpan.';
        } elseif ($request->has('Simpan_wawancara')) {
            $factors = [5, 6, 7, 8];
            $message = 'Data wawancara berhasil disimpan.';
        } elseif ($request->has('Simpan_sikapkerja')) {
            $factors = [9, 10, 11, 12];
            $message = 'Data sikap kerja berhasil disimpan.';
        } else {
            return redirect()->route('profile')->with('error', 'Jenis penyimpanan tidak valid.');
        }

        // Debug: Print all request data
        // dd($request->all());

        // Begin database transaction
        DB::transaction(function () use ($factors, $request) {
            // Delete old data
            DB::table('pm_sample')->whereIn('id_faktor', $factors)->delete();

            // Fetch pelamar data
            $pelamars = DB::table('master_pelamar')->get();

            foreach ($pelamars as $pelamar) {
                foreach ($factors as $factor) {
                    $requestKey = $pelamar->id_pelamar . '_A' . $factor;
                    if ($request->has($requestKey)) {
                        $value = $request->input($requestKey);

                        // Debug: Print the request key and value
                        // dd($requestKey, $value);

                        DB::table('pm_sample')->insert([
                            'id_sample' => null,
                            'id_pelamar' => $pelamar->id_pelamar,
                            'id_faktor' => $factor,
                            'value' => $value,
                        ]);
                    }
                }
            }
        });

        return redirect()->route('profile.index')->with('success', $message);
    }
}
