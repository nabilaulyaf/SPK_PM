<x-form_layout>
  <div class="container">
    <h2 align="center" style="margin: 30px;">Edit Data Pelamar</h2>
    <form method="POST" action="{{ route('pelamar.update', $pelamar->id_pelamar) }}">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-sm-6 offset-sm-3">
          <div class="form-group">
            <label>Nama Pelamar</label>
            <input type="text" name="nama_pelamar" id="nama_pelamar" class="form-control" required="true" value="{{ $pelamar->nama_pelamar }}" required>
          </div>
          <div class="form-group">
            <label>No Handphone</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required="true" value="{{ $pelamar->no_hp }}" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="Email" name="email" id="email" class="form-control" required="true" value="{{ $pelamar->email }}" required>
          </div>
          
          <div class="form-group">
            <button type="submit" name="simpan" id="simpan" class="btn btn-primary">
              <i class="fa fa-save"></i> Simpan
            </button>
  
            <button type="submit" name="simpan" id="simpan" class="btn btn-danger" >
              <a href="{{ route('pelamar.index') }}" style="color:white;text-decoration: none; "></i>Batal</a>
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-form_layout>