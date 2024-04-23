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
        <div class="row mb-3 mt-5">
          {{-- <div class="col-12">
            <label for="role" class="text-secondary mb-3">Role</label>
            <div class="input-group mb-2">
              <select class="form-select" name="role">
                <option>Pilih Role</option>
                <option value="Admin" {{$data->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Guru" {{ $data->role == 'Guru' ? 'selected' : '' }}>Guru</option>
                <option value="Siswa" {{ $data->role == 'Siswa' ? 'selected' : '' }}>Siswa</option>
              </select>
            </div>
            @error('role')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div> --}}
        </div>
        <div class="row mb-3">
          <div class="mb-4 col-12">
            <label for="id_admin" class="text-secondary mb-3">id_admin</label>
            <div class="input-group">
              <input type="text" class="form-control" name="id_admin" value="{{ $data->id_admin }}">
            </div>
          </div>
          <div class="mb-4 col-12">
            <label for="photo" class="text-secondary mb-3">Foto</label>
            <div class="row">
              <div class="col-3">
                <div class="">
                  @if($data->image)
                  <img src="{{asset('storage/photo-admin/'.$data->image) }}" class="profile-foto w-100" alt="">
                  @else
                  <img src="{{asset('img/person-circle.svg') }}" class="profile-foto w-100" alt="">
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
          <div class="mb-4 col-6">
            <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->name }}">
            </div>
          </div>
          <div class="mb-4 col-6">
            <label for="password" class="text-secondary mb-3">Password</label>
            <div class="input-group">
              <input type="text" class="form-control" id="password" name="password" value="{{ $data->password }}">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="mb-4 col-12">
            <label for="email" class="text-secondary mb-3">Email</label>
            <div class="input-group">
              <input type="text" class="form-control" name="email" value="{{ $data->email }}">
            </div>
          </div>
        <div class="row mb-3">
          <div class="mb-4 col-12">
            <label for="alamat" class="text-secondary mb-3">Alamat</label>
            <div class="input-group">
              <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}">
            </div>
          </div>
        <div class="d-flex gap-2 mt-3">
          <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
          <a href="../" class="btn px-3 btn-secondary">Close</a>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
@endsection