@extends('layouts.app')
@section('content')
<form action="{{ route('users.input') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container">
  <div class="row">
    <div class="col-12 mt-4">
      <h4>Tambah Users</h4>
      <form action="">
        <div class="row mb-3 mt-5" data-aos="fade-up">
          <div class="col-12">
            <label for="role" class="text-secondary mb-3">Role</label>
            <div class="input-group mb-2">
              <select class="form-select" id="role" name="role">
                <option selected>Pilih Role</option>
                <option value="Admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="Guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="Siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
              </select>
            </div>
            @error('role')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        {{-- NISN dan NIP --}}
        <div class="row mb-3 d-none" data-aos="fade-up" id="nisn">
          <div class="col-12">
            <label for="nisn" class="text-secondary mb-3">NISN</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('nisn')}}" class="form-control" name="nisn">
            </div>
            @error('nisn')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3 d-none" data-aos="fade-up" id="nip">
          <div class="col-12">
            <label for="nip" class="text-secondary mb-3">NIP</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('nip')}}" class="form-control" name="nip">
            </div>
            @error('nip')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3 d-none" data-aos="fade-up" id="id_admin">
          <div class="col-12">
            <label for="id_admin" class="text-secondary mb-3">id_admin</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('id_admin')}}" class="form-control" name="id_admin">
            </div>
            @error('id_admin')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3" data-aos="fade-up">
          <div class="col-12 col-md-12">
            <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('nama')}}" class="form-control" name="nama">
            </div>
            @error('nama')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12 col-md-6">
            <label for="email" class="text-secondary mb-3">Email</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="email" name="email">
            </div>
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12 col-md-6">
            <label for="password" class="text-secondary mb-3">Password</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="password" name="password">
            </div>
            @error('passsword')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        </div>
        {{-- belum dipake --}}
        {{-- spatie di sini untuk akses user --}}
        {{-- <div class="row mb-3">
          <div class="col-12">
            <label for="statkarir" class="text-secondary mb-3">Status Karir</label>
            <select class="form-select form-select-sm py-2 mb-3 text-secondary" aria-label="Small select example" id="statkarir" name="status">
              <option selected>Open this select menu</option>
              <option value="1">Bekerja</option> --}}
              {{-- beri dia peringatan untuk menginput data nilai jika memilih kuliah dan jika dia seorang alumni --}}
              {{-- <option value="2">Kuliah</option>
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
        <script> --}}
          
          {{-- document.getElementById('statkarir').addEventListener('change', function () {
            var selectedValue = this.value;
            var nilaiKuliahForm = document.getElementById('nilaiKuliahForm');

            // Tampilkan form input nilai kuliah jika memilih berkuliah
            if (selectedValue === '2') { // Ubah '2' dengan nilai yang sesuai untuk opsi "Berkuliah"
                nilaiKuliahForm.classList.remove('d-none');
            } else {
                nilaiKuliahForm.classList.add('d-none');
            }
        });
        </script> --}}
        {{-- end belum dipake --}}

        <div class="d-flex gap-2 mt-5">
          <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
          <button type="reset" class="btn px-3 btn-danger">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
<script>
document.getElementById('role').addEventListener('change', function() {
    var role = this.value;
    var nisnInput = document.getElementById('nisn');
    var nipInput = document.getElementById('nip');
    var idAdminInput = document.getElementById('id_admin');

    // Sembunyikan semua input terlebih dahulu
    nisnInput.classList.add('d-none');
    nipInput.classList.add('d-none');
    idAdminInput.classList.add('d-none');

    // Tampilkan input yang sesuai dengan opsi yang dipilih
    if (role === 'Admin') {
        idAdminInput.classList.remove('d-none');
    } else if (role === 'Guru') {
        nipInput.classList.remove('d-none');
    } else if (role === 'Siswa') {
        nisnInput.classList.remove('d-none');
    }
})
</script>
@endsection