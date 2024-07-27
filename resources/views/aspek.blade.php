<x-layout>
	<x-slot:pageName>{{ $pageName }}</x-slot:pageName>
	<div class="container">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
							<tr>
									<th>No</th>
									<th>Aspek Penilaian</th>
									<th>Persentase</th>
									<th>Core Factor</th>
									<th>Secondary Factor</th>
							</tr>
					</thead>
					<tbody>
							@php $no = 1; @endphp
							@forelse ($aspek as $a)
									<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $a->aspek }}</td>
											<td>{{ $a->prosentase }}</td>
											<td>{{ $a->bobot_core }}</td>
											<td>{{ $a->bobot_secondary }}</td>
									</tr>
							@empty
									<tr>
											<td colspan="5">Tidak ada data ditemukan</td>
									</tr>
							@endforelse
					</tbody>
			</table>
	</div>

	<script type="text/javascript">
			$(document).ready(function() {
					$('#example').DataTable();
			});
	</script>
</x-layout>
