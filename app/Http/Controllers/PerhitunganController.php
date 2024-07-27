<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function index()
    {
        // Ambil data pelamar dengan nilai kriteria
        $pelamar = DB::table('master_pelamar')
            ->leftJoin(DB::raw('(SELECT id_pelamar, 
                                        SUM(IF(id_faktor=1, value, 0)) AS A1,
                                        SUM(IF(id_faktor=2, value, 0)) AS A2,
                                        SUM(IF(id_faktor=3, value, 0)) AS A3,
                                        SUM(IF(id_faktor=4, value, 0)) AS A4,
                                        SUM(IF(id_faktor=5, value, 0)) AS A5,
                                        SUM(IF(id_faktor=6, value, 0)) AS A6,
                                        SUM(IF(id_faktor=7, value, 0)) AS A7,
                                        SUM(IF(id_faktor=8, value, 0)) AS A8,
                                        SUM(IF(id_faktor=9, value, 0)) AS A9,
                                        SUM(IF(id_faktor=10, value, 0)) AS A10,
                                        SUM(IF(id_faktor=11, value, 0)) AS A11,
                                        SUM(IF(id_faktor=12, value, 0)) AS A12
                                 FROM pm_sample 
                                 GROUP BY id_pelamar
                                 ) AS pm'), 'master_pelamar.id_pelamar', '=', 'pm.id_pelamar')
            ->select('master_pelamar.id_pelamar', 'master_pelamar.nama_pelamar', 
                     'pm.A1', 'pm.A2', 'pm.A3', 'pm.A4', 
                     'pm.A5', 'pm.A6', 'pm.A7', 'pm.A8', 
                     'pm.A9', 'pm.A10', 'pm.A11', 'pm.A12')
            ->get();

        // Ambil nilai kriteria
        $faktors = DB::table('pm_faktor')
            ->whereIn('id_faktor', range(1, 12))
            ->pluck('target', 'id_faktor');

        // Ambil bobot gap
        $bobot = DB::table('pm_bobot')
            ->pluck('bobot', 'selisih');

        // Ambil persentase bobot core dan secondary
        $core_persen = DB::table('pm_aspek')
            ->where('id_aspek', 3)
            ->value('bobot_core');
        
        $secondary_persen = DB::table('pm_aspek')
            ->where('id_aspek', 3)
            ->value('bobot_secondary');
        
        $tipeFaktor = function ($id_faktor) {
            return DB::table('pm_faktor')
                ->where('id_faktor', $id_faktor)
                ->value('type');
        };

        [$results, $persens] = $this->hasilAkhir();

        $pageName = 'Hasil Perhitungan';
        return view('perhitungan', [
            'pelamar' => $pelamar,
            'faktors' => $faktors,
            'bobot' => $bobot,
            'core_persen' => $core_persen,
            'secondary_persen' => $secondary_persen,
            'results' => $results,
            'persens' => $persens,
            'tipeFaktor' => $tipeFaktor,
            'pageName' => $pageName,
        ]);
    }

    private function hasilAkhir()
    {
        // Ambil nilai persen
        $persens = [
            1 => DB::table('pm_aspek')->where('id_aspek', 1)->value('Prosentase'),
            2 => DB::table('pm_aspek')->where('id_aspek', 2)->value('Prosentase'),
            3 => DB::table('pm_aspek')->where('id_aspek', 3)->value('Prosentase')
        ];

        // Ambil nilai target
        $values = [];
        for ($i = 1; $i <= 12; $i++) {
            $values[$i] = DB::table('pm_faktor')->where('id_faktor', $i)->value('target');
        }

        // Ambil data pelamar dan nilai aspek
        $pelamar = DB::table('master_pelamar')
            ->leftJoin(DB::raw('(SELECT id_pelamar,
                SUM(IF(id_faktor=1, value, 0)) AS A1,
                SUM(IF(id_faktor=2, value, 0)) AS A2,
                SUM(IF(id_faktor=3, value, 0)) AS A3,
                SUM(IF(id_faktor=4, value, 0)) AS A4,
                SUM(IF(id_faktor=5, value, 0)) AS A5,
                SUM(IF(id_faktor=6, value, 0)) AS A6,
                SUM(IF(id_faktor=7, value, 0)) AS A7,
                SUM(IF(id_faktor=8, value, 0)) AS A8,
                SUM(IF(id_faktor=9, value, 0)) AS A9,
                SUM(IF(id_faktor=10, value, 0)) AS A10,
                SUM(IF(id_faktor=11, value, 0)) AS A11,
                SUM(IF(id_faktor=12, value, 0)) AS A12
            FROM pm_sample
            GROUP BY id_pelamar) pm'), 'master_pelamar.id_pelamar', '=', 'pm.id_pelamar')
            ->select('master_pelamar.id_pelamar', 'master_pelamar.nama_pelamar', 'pm.*')
            ->get();

        $results = [];

        foreach ($pelamar as $row) {
            $terbobot = [];
            for ($i = 1; $i <= 12; $i++) {
                $bobot = $row->{'A'.$i} - $values[$i];
                $bobot_row = DB::table('pm_bobot')->where('selisih', $bobot)->value('bobot');
                $terbobot[$i] = $bobot_row;
            }

            $core_persen = [
                1 => DB::table('pm_aspek')->where('id_aspek', 1)->value('bobot_core'),
                2 => DB::table('pm_aspek')->where('id_aspek', 2)->value('bobot_core'),
                3 => DB::table('pm_aspek')->where('id_aspek', 3)->value('bobot_core')
            ];
            $secondary_persen = [
                1 => DB::table('pm_aspek')->where('id_aspek', 1)->value('bobot_secondary'),
                2 => DB::table('pm_aspek')->where('id_aspek', 2)->value('bobot_secondary'),
                3 => DB::table('pm_aspek')->where('id_aspek', 3)->value('bobot_secondary')
            ];

            $nilai_aspek = [
                1 => ($core_persen[1] * (($terbobot[1] + $terbobot[3]) / 2) / 100) + ($secondary_persen[1] * (($terbobot[2] + $terbobot[4]) / 2) / 100),
                2 => ($core_persen[2] * (($terbobot[5] + $terbobot[7]) / 2) / 100) + ($secondary_persen[2] * (($terbobot[6] + $terbobot[8]) / 2) / 100),
                3 => ($core_persen[3] * (($terbobot[9] + $terbobot[10]) / 2) / 100) + ($secondary_persen[3] * (($terbobot[11] + $terbobot[12]) / 2) / 100)
            ];

            $nilai_total = (
                ($persens[1] * $nilai_aspek[1] / 100) +
                ($persens[2] * $nilai_aspek[2] / 100) +
                ($persens[3] * $nilai_aspek[3] / 100)
            );

            // Ambil ranking pelamar
            $rankQuery = "
                SELECT rank
                FROM (
                    SELECT id_pelamar, nilai_akhir, @curRank := @curRank + 1 AS rank
                    FROM pm_ranking p, (SELECT @curRank := 0) r
                    ORDER BY nilai_akhir DESC
                ) tbl
                WHERE id_pelamar = {$row->id_pelamar}
            ";
            $rankResult = DB::select($rankQuery);
            $rank = !empty($rankResult) ? $rankResult[0]->rank : 'N/A';

            $results[] = [
                'nama_pelamar' => $row->nama_pelamar,
                'nilai_aspek' => $nilai_aspek,
                'nilai_total' => $nilai_total,
                'rank' => $rank
            ];

            // Update ranking
            DB::table('pm_ranking')->updateOrInsert(
                ['id_pelamar' => $row->id_pelamar],
                ['nilai_akhir' => $nilai_total]
            );
        }

        return [$results, $persens];
    }
}