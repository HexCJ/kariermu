@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Data Diri</h4>
        </div>
        <div class="container-fluid px-4">
          <div class="row">
            <div class="col p-0">
              <div class="card mt-3">
                <div class="card-body">
                  <div class="data-profile row px-5 py-3">
                    <div class="col-12 col-md-6">
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->name }}</p>
                      </div>
                      {{-- Email --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->email }}</p>
                      </div>
                      {{-- Alamat --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->alamat }}</p>
                      </div>
                      {{-- jk --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->jenis_kelamin }}</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->nisn }}</p>
                      </div>
                      {{-- Kelas --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-school me-2"></i>Kelas</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->kelas }}</p>
                      </div>
                      {{-- Jurusan --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tie me-2"></i>Jurusan</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->jurusan }}</p>
                      </div>
                      {{-- Tahun lulus --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-calendar-days me-2"></i>Tahun Lulus</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->tahun_lulus }}</p>
                      </div>
                      {{-- Tahun lulus --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-graduation-cap me-2"></i>Status</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $user->status }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection