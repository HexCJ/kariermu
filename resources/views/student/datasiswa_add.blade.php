@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
      <h4>Tambah Siswa</h4>
      <form action="">
        <div class="row mb-3 mt-5">
          <div class="col-12">
            <label for="nama" class="text-secondary mb-3">NISN</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nama">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label for="email" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group">
              <input type="email" class="form-control" id="email">
            </div>
          </div>
          <div class="col-6">
            <label for="mapel" class="text-secondary mb-3">Kelas</label>
            <select class="form-select form-select-sm py-2 mb-3 text-secondary" aria-label="Small select example" id="mapel">
              <option selected>Open this select menu</option>
              <option value="1">2022</option>
              <option value="2">2023</option>
              <option value="3">2024</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <label for="password" class="text-secondary mb-3">Tahun Lulus</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password">
            </div>
          </div>
        </div>
        {{-- spatie di sini untuk akses user --}}
        <div class="row mb-3">
          <div class="col-12">
            <label for="statkarir" class="text-secondary mb-3">Status Karir</label>
            <select class="form-select form-select-sm py-2 mb-3 text-secondary" aria-label="Small select example" id="statkarir">
              <option selected>Open this select menu</option>
              <option value="1">Bekerja</option>
              {{-- beri dia peringatan untuk menginput data nilai jika memilih kuliah dan jika dia seorang alumni --}}
              <option value="2">Kuliah</option>
              <option value="3">Menganggur</option>
            </select>
          </div>
        </div>

        <div class="row mb-3 d-none" id="nilaiKuliahForm">
          <div class="col-12">
            <label for="nilaiKuliah" class="text-secondary mb-3">Nilai Kuliah</label>
            <input type="number" class="form-control" id="nilaiKuliah" name="nilaiKuliah" placeholder="Masukkan nilai kuliah">
          </div>
        </div>
        <script>
          
          document.getElementById('statkarir').addEventListener('change', function () {
            var selectedValue = this.value;
            var nilaiKuliahForm = document.getElementById('nilaiKuliahForm');

            // Tampilkan form input nilai kuliah jika memilih berkuliah
            if (selectedValue === '2') { // Ubah '2' dengan nilai yang sesuai untuk opsi "Berkuliah"
                nilaiKuliahForm.classList.remove('d-none');
            } else {
                nilaiKuliahForm.classList.add('d-none');
            }
        });
        </script>

        <div class="d-flex gap-2 mt-5">
          <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
          <button type="reset" class="btn px-3 btn-danger">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection