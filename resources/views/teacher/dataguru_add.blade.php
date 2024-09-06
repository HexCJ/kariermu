@extends('layouts.app')
@section('content')
<form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container">
  <div class="row">
    <div class="col-12 mt-4">
      <h4>Tambah Guru</h4>
      <form action="">
        <div class="row mb-3 mt-5"  data-aos="fade-up">
          <div class="col-12" data-aos="fade-up">
            <label for="nama" class="text-secondary mb-3">NIP</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="nip" value="{{ old('nip') }}" name="nip">
            </div>
            @error('nip')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="col-12" data-aos="fade-up">
          <label for="photo" class="text-secondary mb-3">Masukan photo anda</label>
          <div class="input-group mb-2">
            <input type="file" value="{{old('photo')}}" class="form-control" id="photo" name="photo">
          </div>
          @error('photo')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="row mt-3" data-aos="fade-up">
          <div class="col-12 col-md-6">
            <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('nama')}}" class="form-control" id="nama" name="nama">
            </div>
            @error('nama')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12 col-md-6">
            <label for="jkelamin" class="text-secondary mb-3">Jenis Kelamin</label>
            <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="jkelamin" name="jkelamin"  value="{{old('jkelamin')}}">
              <option value="">Pilih Jenis Kelamin</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            @error('jkelamin')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3" data-aos="fade-up">
          <div class="col-12">
            <label for="alamat" class="text-secondary mb-3">Alamat</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('alamat')}}" class="form-control" id="alamat" name="alamat">
            </div>
            @error('alamat')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3" data-aos="fade-up">
          <div class="col-12 col-md-6">
            <label for="email" class="text-secondary mb-3">Email</label>
            <div class="input-group mb-2">
              <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}" >
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
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 mb-3">
            <label for="kelas" class="text-secondary mb-3">Kelas</label>
            <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="kelas" name="kelas"  value="{{old('kelas')}}">
              <option value="">Pilih Kelas</option>
              <option value="X">X/SEPULUH</option>
              <option value="XI">XI/SEBELAS</option>
              <option value="XII">XII/DUA BELAS</option>
            </select>
            @error('kelas')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12 col-md-6 mb-3">
            <label for="jurusan" class="text-secondary mb-3">Jurusan</label>
            <select class="form-select form-select-sm py-2 mb-2 text-secondary" aria-label="Small select example" id="jurusan" name="jurusan"  value="{{old('jurusan')}}" >
              <option value="" disabled>Pilih Jurusan</option>
              @foreach($jurusans as $jurusan)
                  <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
              @endforeach
            </select>
            @error('jurusan')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
      <div class="row mb-3" data-aos="fade-up">
        <div class="col-12">
          <label for="urutan_kelas" class="text-secondary mb-3">Urutan Kelas</label>
          <div class="input-group mb-2">
            <input type="text" value="{{old('urutan_kelas')}}" class="form-control" id="urutan_kelas" name="urutan_kelas">
          </div>
          @error('urutan_kelas')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>
        <div class="row" data-aos="fade-up">
          <div class="col-12">
            <label for="matapelajaran" class="text-secondary mb-3">Mata Pelajaran</label>
            <select class="form-select form-select-sm py-2 mb-3 text-secondary" aria-label="Small select example" id="matapelajaran" name="matapelajaran">
              <option selected disabled>Pilih Mata Pelajaran</option>
              @foreach($matapelajarans as $matapelajaran)
                  <option value="{{ $matapelajaran->id_mata_pelajaran }}">{{ $matapelajaran->nama_mata_pelajaran }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="d-flex gap-2 mt-3">
          <a href="{{ route('guru') }}" class="btn px-3 btn-secondary">Close</a>
          <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
@endsection
