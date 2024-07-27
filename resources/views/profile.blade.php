<x-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <div class="container">
        <form method="POST" action="{{ route('profile.save') }}">
            @csrf
            <div class="card mb-6 shadow-sm">
                <div class="card-header">
                    <div class="col-6">
                        <select class="custom-select d-block w-50" id="aspek" name="aspek" required>
                            <option value="">Pilih Aspek...</option>
                            <option value="kecerdasan" {{ request('aspek') == "kecerdasan" ? "selected" : "" }}>Kecerdasan</option>
                            <option value="wawancara" {{ request('aspek') == "wawancara" ? "selected" : "" }}>Wawancara</option>
                            <option value="sikapkerja" {{ request('aspek') == "sikapkerja" ? "selected" : "" }}>Sikap Kerja</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Kecerdasan -->
                    <div id="spninactive_kecerdasan" style="{{ request('aspek') == 'kecerdasan' ? 'display:block;' : 'display:none;' }}">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A1 - Problem Solving</th>
                                    <th>A2 - Kreatif</th>
                                    <th>A3 - Logika</th>
                                    <th>A4 - Inovatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A1">
                                            <option value="1" {{ old($row->id_pelamar.'_A1', $row->A1 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A1', $row->A1 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A1', $row->A1 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A1', $row->A1 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A2">
                                            <option value="1" {{ old($row->id_pelamar.'_A2', $row->A2 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A2', $row->A2 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A2', $row->A2 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A2', $row->A2 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A3">
                                            <option value="1" {{ old($row->id_pelamar.'_A3', $row->A3 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A3', $row->A3 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A3', $row->A3 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A3', $row->A3 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A4">
                                            <option value="1" {{ old($row->id_pelamar.'_A4', $row->A4 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A4', $row->A4 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A4', $row->A4 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A4', $row->A4 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-success" type="submit" id="Simpan_kecerdasan" name="Simpan_kecerdasan">Simpan</button>
                    </div>
                    
                    <!-- Wawancara -->
                    <div id="spninactive_wawancara" style="{{ request('aspek') == 'wawancara' ? 'display:block;' : 'display:none;' }}">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A5 - Kejujuran</th>
                                    <th>A6 - Pengetahuan Tentang Dept/Biro</th>
                                    <th>A7 - Pengalaman</th>
                                    <th>A8 - Karakter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A5">
                                            <option value="1" {{ old($row->id_pelamar.'_A5', $row->A5 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A5', $row->A5 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A5', $row->A5 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A5', $row->A5 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A6">
                                            <option value="1" {{ old($row->id_pelamar.'_A6', $row->A6 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A6', $row->A6 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A6', $row->A6 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A6', $row->A6 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A7">
                                            <option value="1" {{ old($row->id_pelamar.'_A7', $row->A7 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A7', $row->A7 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A7', $row->A7 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A7', $row->A7 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A8">
                                            <option value="1" {{ old($row->id_pelamar.'_A8', $row->A8 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A8', $row->A8 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A8', $row->A8 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A8', $row->A8 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-success" type="submit" id="Simpan_wawancara" name="Simpan_wawancara">Simpan</button>
                    </div>
                    
                    <!-- Sikap Kerja -->
                    <div id="spninactive_sikapkerja" style="{{ request('aspek') == 'sikapkerja' ? 'display:block;' : 'display:none;' }}">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Pelamar</th>
                                    <th>A9 - Ketepatan Waktu</th>
                                    <th>A10 - Disiplin</th>
                                    <th>A11 - Tanggung Jawab</th>
                                    <th>A12 - Kerjasama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelamar as $row)
                                <tr>
                                    <td>{{ $row->nama_pelamar }}</td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A9">
                                            <option value="1" {{ old($row->id_pelamar.'_A9', $row->A9 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A9', $row->A9 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A9', $row->A9 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A9', $row->A9 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A10">
                                            <option value="1" {{ old($row->id_pelamar.'_A10', $row->A10 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A10', $row->A10 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A10', $row->A10 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A10', $row->A10 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A11">
                                            <option value="1" {{ old($row->id_pelamar.'_A11', $row->A11 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A11', $row->A11 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A11', $row->A11 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A11', $row->A11 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="custom-select d-block w-100" name="{{ $row->id_pelamar }}_A12">
                                            <option value="1" {{ old($row->id_pelamar.'_A12', $row->A12 ?? '') == '1' ? 'selected' : '' }}>1 - Kurang</option>
                                            <option value="2" {{ old($row->id_pelamar.'_A12', $row->A12 ?? '') == '2' ? 'selected' : '' }}>2 - Cukup</option>
                                            <option value="3" {{ old($row->id_pelamar.'_A12', $row->A12 ?? '') == '3' ? 'selected' : '' }}>3 - Baik</option>
                                            <option value="4" {{ old($row->id_pelamar.'_A12', $row->A12 ?? '') == '4' ? 'selected' : '' }}>4 - Sangat Baik</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-success" type="submit" id="Simpan_sikapkerja" name="Simpan_sikapkerja">Simpan</button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</x-layout>
  
<script src="{{ asset('js/aspek.js') }}"></script>
