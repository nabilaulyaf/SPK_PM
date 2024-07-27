<x-layout>
  <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
  <div class="jumbotron">
    <h3>Selamat Datang di Aplikasi SPK Penerimaan Pegawai Dengan Metode Profile Matching</h3>
    <p>Halo <strong>{{ session('logged_in_username') ?? 'user' }}</strong></p>
    <p>
      Profile matching merupakan suatu proses yang sangat penting dalam manajemen SDM dimana terlebih dahulu ditentukan kompetensi (kemampuan) yang diperlukan oleh suatu jabatan. Kompetensi atau kemampuan tersebut haruslah dapat dipenuhi oleh pemegang atau calon pemegang jabatan. Dalam proses profile matching secara garis besar merupakan proses membandingkan antara kompetensi individu kedalam kompetensi jabatan sehingga dapat diketahui perbedaan kompetensinya (disebut juga Gap), semakin kecil gap yang dihasilkan maka bobot nilainya semakin besar yang berarti memiliki peluang lebih besar untuk pegawai yang menempati posisi tersebut. (Sianturi, 2015:45).
    </p>       
  </div>
</x-layout>