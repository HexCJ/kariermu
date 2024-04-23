@extends('layouts.app')
@section('content')
<form action="{{ route('karir.update', ['id' => $siswa->nisn]) }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container-fluid">
  <div class="row">
    <div class="modal fade" id="addDataKarir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Karir</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- add section --}}
          <div class="modal-body">
            <form action="{{ route('karir.update', ['id' => $siswa->nisn]) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <form action="">
                    <div class="col-12 mb-3">
                      <label for="status" class="text-secondary mb-3">Status</label>
                      <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="status" name="status">
                        <option selected >Pilih Status Anda</option>
                        <option value="Bekerja"{{ old('status') == 'Bekerja' ? 'selected' : '' }}>Bekerja</option> 
                        <option value="Kuliah">{{ old('status') == 'Kuliah' ? 'selected' : '' }}Kuliah</option>
                        <option value="Menganggur"{{ old('status') == 'Menganggur' ? 'selected' : '' }}>Menganggur</option>
                        <option value="Wirausaha"{{ old('status') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                      </select>
                      @error('status')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 mb-3">
                      <label for="tempat_kerja_kuliah" class="text-secondary mb-3 d-none" id="kerja">Tempat Kerja</label>
                      <label for="tempat_kerja_kuliah" class="text-secondary mb-3 d-none" id="kuliah">Tempat Kuliah</label>
                      <label for="tempat_kerja_kuliah" class="text-secondary mb-3 d-none" id="wirausaha">Tempat Berw</label>
                      <div class="input-group mb-2 d-none" id="input">
                        <input type="text" value="{{old('tempat_kerja_kuliah')}}" class="form-control" id="tempat_kerja_kuliah" name="tempat_kerja_kuliah">
                      </div>
                      @error('tempat_kerja_kuliah')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    {{-- jiika datanya kosong --}}
                </div>
              </div>
              <div class="modal-footer">
                <script>
                      document.addEventListener('DOMContentLoaded', function() {
                      document.getElementById('status').addEventListener('change', function() {
                          var status = this.value;
                          var kerja = document.getElementById('kerja');
                          var kuliah = document.getElementById('kuliah');
                          var wirausaha = document.getElementById('wirausaha');
                          var input = document.getElementById('input');
                      
                          // Tampilkan input yang sesuai dengan opsi yang dipilih
                          if (status === 'Bekerja') {
                            kerja.classList.remove('d-none');
                            input.classList.remove('d-none');
                            kuliah.classList.add('d-none');
                            wirausaha.classList.add('d-none');
                          } else if (status === 'Kuliah') {
                            kuliah.classList.remove('d-none');
                            input.classList.remove('d-none');
                            kerja.classList.add('d-none');
                            wirausaha.classList.add('d-none');
                          } else if (status === 'Wirausaha') {
                            input.classList.remove('d-none');
                            wirausaha.classList.remove('d-none');
                            kuliah.classList.add('d-none');
                            kerja.classList.add('d-none');  
                          } else {
                              input.classList.add('d-none');
                              kuliah.classList.add('d-none');
                              kerja.classList.add('d-none');  
                              wirausaha.classList.add('d-none');  
                          }
                      });
                  });
                  </script>
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
            <form action="{{ route('karir.update', ['id' => $siswa->nisn]) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <form action="">
                    <div class="col-12 mb-3">
                      <label for="status" class="text-secondary mb-3">Status</label>
                      <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="status" name="status">
                        <option selected>Pilih Status Anda</option>
                        <option value="Bekerja" {{ $siswa->status == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                        <option value="Kuliah" {{ $siswa->status == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                        <option value="Menganggur" {{ $siswa->status == 'Menganggur' ? 'selected' : '' }}>Menganggur</option>
                        <option value="Wirausaha" {{ $siswa->status == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
                      </select>
                      @error('status')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="row">
                      <div class="col-12 mb-3">
                        <label for="tempat_kerja_kuliah" class="text-secondary mb-3">tempat kerja / kuliah</label>
                        <div class="input-group mb-2">
                          <input type="text" value="{{ $siswa->tempat_kerja_kuliah }}" class="form-control" id="tempat_kerja_kuliah" name="tempat_kerja_kuliah">
                        </div>
                        @error('tempat_kerja_kuliah')
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
  @if ($siswa->status == false)
    <div class="row">
      <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Laporan Data Karir Siswa</h4>
          {{-- jika gak ada --}}
          @if ($siswa->status == false)
          <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto" data-bs-toggle="modal" data-bs-target="#addDataKarir"><i class="fa-solid fa-briefcase me-2"></i>Lapor Karir</a>
          @endif
        </div>
          <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 90vh" data-aos="fade-up">
            <img src="{{ asset('img/data_kosong.png') }}" alt="" class="data-kosong">
            <p class="fw-semibold mt-5 mb-0">Anda Belum Melaporkan Data Karir</p>
            <p class="mt-2">Segera Laporkan Karir Anda</p>
          </div>
        </div>
      </div>
    @endif
      {{-- jika ada --}}
    <div class="row">
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col p-0">
            @if($siswa->status == true)
            <div class="card mt-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="data-profile row px-5 py-3">
                      <div class="col-12">
                        {{-- Nama --}}
                        <div class="form-group mb-4" data-aos="fade-right">
                          <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Status Karir</label>
                          <p class="text-secondary mb-3 mt-2 p-2 card">{{$siswa->status}}</p>
                        </div>
                        {{-- Alamat --}}
                        <div class="form-group mb-4" data-aos="fade-right">
                          <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat Tempat Kerja/Kuliah</label>
                          <p class="text-secondary mb-3 mt-2 p-2 card">{{$siswa->tempat_kerja_kuliah}}</p>
                        </div>
                      </div>  
                      <div class="d-flex justify-content-end">
                        <p class="position-absolute"><a href="" class="cursor-pointer btn btn-success" data-bs-toggle="modal" data-bs-target="#editDataKarir"><i class="fa-regular fa-pen-to-square"></i></a></p>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
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