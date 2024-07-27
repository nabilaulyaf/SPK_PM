<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <span class="fas fa-home" style="font-size:14px"></span>
          Home <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pelamar.index') }}">
          <span class="fas fa-user-friends" style="font-size:14px"></span>
          Data Pelamar
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('aspek.index') }}">
          <span class="fas fa-file" style="font-size:14px"></span>
          Aspek Penilaian
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
          <span class="fas fa-copy" style="font-size:14px"></span>
          Kriteria Penilaian
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.index') }}">
          <span class="fas fa-sync-alt" style="font-size:14px"></span>
          Proses Profile Matching
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('perhitungan.index') }}">
          <span class="fas fa-archive" style="font-size:14px"></span>
          Hasil Perhitungan
        </a>
      </li>      
    </ul>
  </div>
</nav>