<x-layout>
  <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
  <div class="container">
    <a href="{{ route('pelamar.create') }}">
      <button style="margin-bottom: 20px;" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
    </a>
  
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pelamar</th>
          <th>No Handphone</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pelamars as $index => $pelamar)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pelamar->nama_pelamar }}</td>
            <td>{{ $pelamar->no_hp }}</td>
            <td>{{ $pelamar->email }}</td>
            <td>
              <a href="{{ route('pelamar.edit', $pelamar->id_pelamar) }}">
                <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button>
              </a>
              <form action="{{ route('pelamar.destroy', $pelamar->id_pelamar) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach

        @if ($pelamars->isEmpty())
          <tr>
            <td colspan="5">Tidak ada data ditemukan</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
</x-layout>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
