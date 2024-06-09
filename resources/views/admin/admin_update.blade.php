@extends('layouts.app')
@section('content')
<form action="{{ route('admin.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
<div class="container">
  <div class="row">
    <div class="col-12 mt-4">
      <h4>Edit Data Users</h4>
      <form action="">
        <div class="row mb-3">
          <div class="mb-2 mt-3 col-12">
            <label for="id_admin" class="text-secondary mb-3">id_admin</label>
            <div class="input-group">
              <input type="text" class="form-control" name="id_admin" value="{{ $data->id_admin }}">
            </div>
          </div>
          <div class="mb-2 mt-3 col-12">
            <label for="photo" class="text-secondary mb-3">Foto</label>
            <div class="row">
              <div class="col-3">
                <div class="">
                  @if($data->image)
                  <img src="{{asset('storage/photo-admin/'.$data->image) }}" class="profile-foto w-100" alt="">
                  @elseif($data->jenis_kelamin === 'Laki-laki')
                  <img src="{{asset('img/sma_profile1.png') }}" class="profile-foto w-100" alt="profile">
                  @elseif($data->jenis_kelamin === 'Perempuan')
                  <img src="{{asset('img/sma_profile2.png') }}" class="profile-foto w-100" alt="profile">
                  @endif
                </div>
              </div>
              <div class="col-9">
                <div class="input-group">
                  <input type="file" class="form-control" id="photo" name="photo">
                </div>
              </div>
            </div>
          </div>
          <div class="mb-2 mt-3 col-12">
            <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->name }}">
            </div>
          </div>
          <div class="mb-2 mt-3 col-12">
            <label for="jkelamin" class="text-secondary mb-3">Jenis Kelamin</label>
            <select class="form-select form-select-sm py-2 text-secondary"
                aria-label="Small select example" id="jkelamin" name="jkelamin">
                <option disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki</option>
                <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan</option>
            </select>
          </div>
          <div class="mb-2 mt-3 col-12">
            <label for="email" class="text-secondary mb-3">Alamat</label>
            <div class="input-group">
              <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
            </div>
          </div>
          <div class="mb-2 mt-3 col-12">
            <label for="email" class="text-secondary mb-3">Email</label>
            <div class="input-group">
              <input type="text" class="form-control" name="email" value="{{ $data->email }}">
            </div>
          </div>
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