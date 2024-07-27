<link href="{{ asset('css/perhitungan.css') }}" rel="stylesheet">
<x-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong>PERHITUNGAN</strong></div>
            <div class="panel-body" style=" border: 1px solid #e7e7e7;">

                {{-- aspek kecerdasan --}}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Aspek Kecerdasan</strong></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <tbody>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A1</th>
                                    <th>A2</th>
                                    <th>A3</th>
                                    <th>A4</th>
                                </tr>
                                @foreach ($pelamar as $row)
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $row->A1 }}</td>
                                    <td>{{ $row->A2 }}</td>
                                    <td>{{ $row->A3 }}</td>
                                    <td>{{ $row->A4 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nilai Kriteria</th>
                                    <td class="text-primary">{{ $faktors[1] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[2] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[3] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[4] ?? 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="panel-body"><strong>Perhitungan pemetaan gap</strong>:</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <tbody>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A1</th>
                                    <th>A2</th>
                                    <th>A3</th>
                                    <th>A4</th>
                                </tr>
                                @foreach ($pelamar as $row)
                                @php
                                $gap1 = $row->A1 - ($faktors[1] ?? 0);
                                $gap2 = $row->A2 - ($faktors[2] ?? 0);
                                $gap3 = $row->A3 - ($faktors[3] ?? 0);
                                $gap4 = $row->A4 - ($faktors[4] ?? 0);
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $gap1 }}</td>
                                    <td>{{ $gap2 }}</td>
                                    <td>{{ $gap3 }}</td>
                                    <td>{{ $gap4 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-body"><strong>Pembobotan nilai gap</strong></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <tbody>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A1</th>
                                    <th>A2</th>
                                    <th>A3</th>
                                    <th>A4</th>
                                </tr>
                                @foreach ($pelamar as $row)
                                @php
                                $bobot1 = $bobot[$row->A1 - ($faktors[1] ?? 0)] ?? 0;
                                $bobot2 = $bobot[$row->A2 - ($faktors[2] ?? 0)] ?? 0;
                                $bobot3 = $bobot[$row->A3 - ($faktors[3] ?? 0)] ?? 0;
                                $bobot4 = $bobot[$row->A4 - ($faktors[4] ?? 0)] ?? 0;
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $bobot1 }}</td>
                                    <td>{{ $bobot2 }}</td>
                                    <td>{{ $bobot3 }}</td>
                                    <td>{{ $bobot4 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-body"><strong>Perhitungan factor</strong>:</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <tbody>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A1</th>
                                    <th>A2</th>
                                    <th>A3</th>
                                    <th>A4</th>
                                    <th>NCF</th>
                                    <th>NSF</th>
                                    <th>Total</th>
                                </tr>
                                @foreach ($pelamar as $row)
                                @php
                                $bobot1 = $bobot[$row->A1 - ($faktors[1] ?? 0)] ?? 0;
                                $bobot2 = $bobot[$row->A2 - ($faktors[2] ?? 0)] ?? 0;
                                $bobot3 = $bobot[$row->A3 - ($faktors[3] ?? 0)] ?? 0;
                                $bobot4 = $bobot[$row->A4 - ($faktors[4] ?? 0)] ?? 0;

                                $ncf = ($bobot1 + $bobot3) / 2;
                                $nsf = ($bobot2 + $bobot4) / 2;

                                $total = ($core_persen * $ncf / 100) + ($secondary_persen * $nsf / 100);
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $bobot1 }}</td>
                                    <td>{{ $bobot2 }}</td>
                                    <td>{{ $bobot3 }}</td>
                                    <td>{{ $bobot4 }}</td>
                                    <td>{{ $ncf }}</td>
                                    <td>{{ $nsf }}</td>
                                    <td class="text-primary">{{ $total }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    @for ($id = 1; $id <= 4; $id++) <td class="text-primary">{{ $tipeFaktor($id) }}</td>
                                        @endfor
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- aspek wawancara --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Aspek Wawancara</strong>
                    </div>

                    {{-- Tabel Nilai Kriteria --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A5</th>
                                    <th>A6</th>
                                    <th>A7</th>
                                    <th>A8</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $row->A5 }}</td>
                                    <td>{{ $row->A6 }}</td>
                                    <td>{{ $row->A7 }}</td>
                                    <td>{{ $row->A8 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nilai Kriteria</th>
                                    <td class="text-primary">{{ $faktors[5] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[6] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[7] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[8] ?? 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {{-- Tabel Pemetaan Gap --}}
                    <div class="panel-body">
                        Perhitungan pemetaan gap:
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A5</th>
                                    <th>A6</th>
                                    <th>A7</th>
                                    <th>A8</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                @php
                                $gap5 = $row->A5 - ($faktors[5] ?? 0);
                                $gap6 = $row->A6 - ($faktors[6] ?? 0);
                                $gap7 = $row->A7 - ($faktors[7] ?? 0);
                                $gap8 = $row->A8 - ($faktors[8] ?? 0);
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $gap5 }}</td>
                                    <td>{{ $gap6 }}</td>
                                    <td>{{ $gap7 }}</td>
                                    <td>{{ $gap8 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Tabel Pembobotan Nilai Gap --}}
                    <div class="panel-body">
                        Pembobotan nilai gap:
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A5</th>
                                    <th>A6</th>
                                    <th>A7</th>
                                    <th>A8</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                @php
                                $bobot5 = $bobot[$row->A5 - ($faktors[5] ?? 0)] ?? 0;
                                $bobot6 = $bobot[$row->A6 - ($faktors[6] ?? 0)] ?? 0;
                                $bobot7 = $bobot[$row->A7 - ($faktors[7] ?? 0)] ?? 0;
                                $bobot8 = $bobot[$row->A8 - ($faktors[8] ?? 0)] ?? 0;
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $bobot5 }}</td>
                                    <td>{{ $bobot6 }}</td>
                                    <td>{{ $bobot7 }}</td>
                                    <td>{{ $bobot8 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Tabel Perhitungan Faktor --}}
                    <div class="panel-body">
                        Perhitungan faktor:
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A5</th>
                                    <th>A6</th>
                                    <th>A7</th>
                                    <th>A8</th>
                                    <th>NCF</th>
                                    <th>NSF</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                @php
                                $bobot5 = $bobot[$row->A5 - ($faktors[5] ?? 0)] ?? 0;
                                $bobot6 = $bobot[$row->A6 - ($faktors[6] ?? 0)] ?? 0;
                                $bobot7 = $bobot[$row->A7 - ($faktors[7] ?? 0)] ?? 0;
                                $bobot8 = $bobot[$row->A8 - ($faktors[8] ?? 0)] ?? 0;

                                $ncf = ($bobot5 + $bobot7) / 2;
                                $nsf = ($bobot6 + $bobot8) / 2;
                                $total = ($core_persen * $ncf / 100) + ($secondary_persen * $nsf / 100);
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $bobot5 }}</td>
                                    <td>{{ $bobot6 }}</td>
                                    <td>{{ $bobot7 }}</td>
                                    <td>{{ $bobot8 }}</td>
                                    <td>{{ $ncf }}</td>
                                    <td>{{ $nsf }}</td>
                                    <td class="text-primary">{{ $total }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    @for ($id = 5; $id <= 8; $id++) <td class="text-primary">{{ $tipeFaktor($id) }}</td>
                                        @endfor
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- aspek sikap kerja --}}
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Aspek Sikap Kerja</strong></div>

                    <!-- Tabel Nilai Kriteria -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A9</th>
                                    <th>A10</th>
                                    <th>A11</th>
                                    <th>A12</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $row->A9 }}</td>
                                    <td>{{ $row->A10 }}</td>
                                    <td>{{ $row->A11 }}</td>
                                    <td>{{ $row->A12 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nilai Kriteria</th>
                                    <td class="text-primary">{{ $faktors[9] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[10] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[11] ?? 0 }}</td>
                                    <td class="text-primary">{{ $faktors[12] ?? 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Tabel Pemetaan Gap -->
                    <div class="panel-body">Perhitungan pemetaan gap:</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A9</th>
                                    <th>A10</th>
                                    <th>A11</th>
                                    <th>A12</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                @php
                                $gap9 = $row->A9 - ($faktors[9] ?? 0);
                                $gap10 = $row->A10 - ($faktors[10] ?? 0);
                                $gap11 = $row->A11 - ($faktors[11] ?? 0);
                                $gap12 = $row->A12 - ($faktors[12] ?? 0);
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $gap9 }}</td>
                                    <td>{{ $gap10 }}</td>
                                    <td>{{ $gap11 }}</td>
                                    <td>{{ $gap12 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabel Pembobotan Nilai Gap -->
                    <div class="panel-body">Pembobotan nilai gap:</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A9</th>
                                    <th>A10</th>
                                    <th>A11</th>
                                    <th>A12</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                @php
                                $bobot9 = $bobot[$row->A9 - ($faktors[9] ?? 0)] ?? 0;
                                $bobot10 = $bobot[$row->A10 - ($faktors[10] ?? 0)] ?? 0;
                                $bobot11 = $bobot[$row->A11 - ($faktors[11] ?? 0)] ?? 0;
                                $bobot12 = $bobot[$row->A12 - ($faktors[12] ?? 0)] ?? 0;
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $bobot9 }}</td>
                                    <td>{{ $bobot10 }}</td>
                                    <td>{{ $bobot11 }}</td>
                                    <td>{{ $bobot12 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabel Perhitungan Faktor -->
                    <div class="panel-body">Perhitungan faktor:</div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" style="border: 0px;">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A9</th>
                                    <th>A10</th>
                                    <th>A11</th>
                                    <th>A12</th>
                                    <th>NCF</th>
                                    <th>NSF</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                @php
                                $bobot9 = $bobot[$row->A9 - ($faktors[9] ?? 0)] ?? 0;
                                $bobot10 = $bobot[$row->A10 - ($faktors[10] ?? 0)] ?? 0;
                                $bobot11 = $bobot[$row->A11 - ($faktors[11] ?? 0)] ?? 0;
                                $bobot12 = $bobot[$row->A12 - ($faktors[12] ?? 0)] ?? 0;

                                $ncf = ($bobot9 + $bobot10) / 2;
                                $nsf = ($bobot11 + $bobot12) / 2;

                                $total = ($core_persen * $ncf / 100) + ($secondary_persen * $nsf / 100);
                                @endphp
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>{{ $bobot9 }}</td>
                                    <td>{{ $bobot10 }}</td>
                                    <td>{{ $bobot11 }}</td>
                                    <td>{{ $bobot12 }}</td>
                                    <td>{{ $ncf }}</td>
                                    <td>{{ $nsf }}</td>
                                    <td class="text-primary">{{ $total }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    @for ($id = 9; $id <= 12; $id++) <td class="text-primary">{{ $tipeFaktor($id) }}</td>
                                        @endfor
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- hasil akhir --}}
                <div id="cetak">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>Hasil Akhir</strong>
                        </div>
                        <div class="panel-body" style="border: 1px solid #e7e7e7;">
                            <div class="panel panel-default">
                                <div class="panel-body"></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Pelamar</th>
                                                <th>Aspek Kecerdasan</th>
                                                <th>Aspek Wawancara</th>
                                                <th>Aspek Sikap Kerja</th>
                                                <th>Total</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Persentase</td>
                                                <td>{{ $persens[1] }}%</td>
                                                <td>{{ $persens[2] }}%</td>
                                                <td>{{ $persens[3] }}%</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $result['nama_pelamar'] }}</td>
                                                <td>{{ $result['nilai_aspek'][1] }}</td>
                                                <td>{{ $result['nilai_aspek'][2] }}</td>
                                                <td>{{ $result['nilai_aspek'][3] }}</td>
                                                <td>{{ $result['nilai_total'] }}</td>
                                                <td class="text-primary">{{ $result['rank'] }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="cetak"></div>
    </div>
</x-layout>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>