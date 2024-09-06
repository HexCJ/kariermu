@extends('layouts.app')
@section('content')
<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
<div class="container">
  <div class="row">
    <div class="col-12 mt-4">
      <h4>Tambah Admin</h4>
      <form action="">
        <div class="row mb-3 mt-5" data-aos="fade-up">
          <div class="col-12">
            <label for="id_admin" class="text-secondary mb-3">ID Admin</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('id_admin')}}" class="form-control" id="id_admin" name="id_admin">
            </div>
            @error('id_admin')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="col-12 mb-3" data-aos="fade-up">
          <label for="photo" class="text-secondary mb-3">Masukan photo anda</label>
          <div class="input-group mb-2">
            <input type="file" value="{{old('photo')}}" class="form-control" id="photo" name="photo">
          </div>
          @error('photo')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-12 col-md-6 mb-3">
            <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('nama')}}" class="form-control" id="nama" name="nama">
            </div>
            @error('nama')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12 col-md-6 mb-3">
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
          <div class="col-12">
            <label for="alamat" class="text-secondary mb-3">Alamat</label>
            <div class="input-group mb-2">
              <input type="text" value="{{old('alamat')}}" class="form-control" id="alamat" name="alamat">
            </div>
            @error('alamat')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        <div class="d-flex gap-2 mt-5">
          <a href="{{ route('admin') }}" class="btn px-3 btn-secondary">Close</a>
          <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
@endsection