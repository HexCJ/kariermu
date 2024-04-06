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

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex gap-2 mt-5">
          <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
          <button type="reset" class="btn px-3 btn-danger">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection