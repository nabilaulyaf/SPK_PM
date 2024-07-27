<x-layout>
	<x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <div class="container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aspek</th>
                    <th>Kriteria</th>
                    <th>Target</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($kriteria as $k)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $k->aspek->aspek }}</td>
                        <td>{{ $k->faktor }}</td>
                        <td>{{ $k->target }}</td>
                        <td>{{ $k->type }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
