@extends('layouts.app')
@section('content')
<form action="{{ route('user.input') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container-fluid">
  <div class="row">
    <!-- Modal Add -->
    <div class="modal fade" id="addDataKarir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Karir</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- add section --}}
          <div class="modal-body">
            <form action="" method="POST">
              @csrf
              <div class="container-fluid">
                <div class="row">
                  <form action="">
                    <div class="col-12 mb-3">
                      <label for="status" class="text-secondary mb-3">Status</label>
                      <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="status" name="status">
                        <option selected>Pilih Status Anda</option>
                        <option value="Belum Lulus">Bekerja</option> 
                        <option value="Lulus">Kuliah</option>
                        <option value="Lulus">Menganggur</option>
                        <option value="Lulus">Wirausaha</option>
                      </select>
                      @error('status')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="row">
                      <div class="col-12 mb-3">
                        <label for="alamat" class="text-secondary mb-3">Tempat Bekerja</label>
                        <div class="input-group mb-2">
                          <input type="text" value="{{old('alamat')}}" class="form-control" id="alamat" name="alamat">
                        </div>
                        @error('alamat')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    {{-- jiika datanya kosong --}}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center" data-bs-dismiss="modal">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- Modal Add -->
    <div class="modal fade" id="editDataKarir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Karir</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- add section --}}
          <div class="modal-body">
            <form action="" method="POST">
              @csrf
              <div class="container-fluid">
                <div class="row">
                  <form action="">
                    <div class="col-12 mb-3">
                      <label for="status" class="text-secondary mb-3">Status</label>
                      <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="status" name="status">
                        <option selected>Pilih Status Anda</option>
                        <option value="Belum Lulus">Bekerja</option> 
                        <option value="Lulus">Kuliah</option>
                        <option value="Lulus">Menganggur</option>
                        <option value="Lulus">Wirausaha</option>
                      </select>
                      @error('status')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="row">
                      <div class="col-12 mb-3">
                        <label for="alamat" class="text-secondary mb-3">Tempat Bekerja</label>
                        <div class="input-group mb-2">
                          <input type="text" value="Universitas Gunadarma" class="form-control" id="alamat" name="alamat">
                        </div>
                        @error('alamat')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>
                    {{-- jiika datanya kosong --}}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center" data-bs-dismiss="modal">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>Laporan Data Karir Siswa</h4>
        {{-- jika gak ada --}}
        <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto" data-bs-toggle="modal" data-bs-target="#addDataKarir"><i class="fa-solid fa-briefcase me-2"></i>Lapor Karir</a>
      </div>
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col p-0">
            <div class="card mt-3">
              <div class="card-body alert alert-danger jika_udah_diinput_dia_gak_lagi_alert-danger">
                <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center min-vh-100" data-aos="fade-up">
                  <h3 class="fw-bold">Anda Belum Melaporkan Data Karir</h3>
                  <h5 class="mt-3">Segera <a href="" class="alert-link" data-bs-toggle="modal" data-bs-target="#addDataKarir">Laporkan </a>Karir Anda</h5>
                </div>
                {{-- jika ada --}}
                <div class="row">
                  <div class="col-12">
                    <div class="data-profile row px-5 py-3">
                      <div class="col-12">
                        {{-- Nama --}}
                        <div class="form-group mb-4" data-aos="fade-right">
                          <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Status Karir</label>
                          <p class="text-secondary mb-3 mt-2 p-2 card">Bekerja</p>
                        </div>
                        {{-- Alamat --}}
                        <div class="form-group mb-4" data-aos="fade-right">
                          <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat Tempat Kerja/Kuliah</label>
                          <p class="text-secondary mb-3 mt-2 p-2 card">Universitas Gunadarma</p>
                        </div>
                      </div>  
                      <div class="d-flex justify-content-end">
                        <p class="position-absolute"><a href="" class="cursor-pointer btn btn-success" data-bs-toggle="modal" data-bs-target="#editDataKarir"><i class="fa-regular fa-pen-to-square"></i></a></p>
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
</div>
@endsection