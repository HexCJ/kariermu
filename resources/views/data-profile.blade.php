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
                        <p class="text-secondary mb-3 mt-2">Jona</p>
                      </div>
                      {{-- Alamat --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <p class="text-secondary mb-3 mt-2">Jl.Jambu</p>
                      </div>
                      {{-- jk --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <p class="text-secondary mb-3 mt-2">Laki-Laki</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                        <p class="text-secondary mb-3 mt-2">367102932211</p>
                      </div>
                      {{-- Kelas --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-school me-2"></i>Kelas</label>
                        <p class="text-secondary mb-3 mt-2">XI(Sebelas)</p>
                      </div>
                      {{-- Jurusan --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tie me-2"></i>Jurusan</label>
                        <p class="text-secondary mb-3 mt-2">Rekayasa Perangkat Lunak</p>
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