document.addEventListener('DOMContentLoaded', function () {
  var aspekSelect = document.getElementById('aspek');
  var kecerdasanTable = document.getElementById('spninactive_kecerdasan');
  var wawancaraTable = document.getElementById('spninactive_wawancara');
  var sikapkerjaTable = document.getElementById('spninactive_sikapkerja');
  var simpanKecerdasanButton = document.getElementById('Simpan_kecerdasan');
  var simpanWawancaraButton = document.getElementById('Simpan_wawancara');
  var simpanSikapkerjaButton = document.getElementById('Simpan_sikapkerja');

  function toggleDisplay() {
      var aspek = aspekSelect.value;
      kecerdasanTable.style.display = aspek === 'kecerdasan' ? 'block' : 'none';
      wawancaraTable.style.display = aspek === 'wawancara' ? 'block' : 'none';
      sikapkerjaTable.style.display = aspek === 'sikapkerja' ? 'block' : 'none';
      simpanKecerdasanButton.style.display = aspek === 'kecerdasan' ? 'inline-block' : 'none';
      simpanWawancaraButton.style.display = aspek === 'wawancara' ? 'inline-block' : 'none';
      simpanSikapkerjaButton.style.display = aspek === 'sikapkerja' ? 'inline-block' : 'none';
  }

  aspekSelect.addEventListener('change', toggleDisplay);
  toggleDisplay();
});
