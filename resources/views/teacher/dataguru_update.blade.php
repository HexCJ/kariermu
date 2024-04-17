@extends('layouts.app')
@section('content')
<form action="{{ route('guru.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
<div class="container">
  <div class="row">
    <div class="col-12 mt-4">
      <h4>Edit Guru</h4>
      <form action="">
        <div class="row mb-3 mt-5" data-aos="fade-up">
          <div class="col-12">
            <label for="nama" class="text-secondary mb-3">NIP</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="nip" name="nip" value="{{ $data->nip }}">
            </div>
            @error('nip')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="mb-4 col-12" data-aos="fade-up">
          <label for="photo" class="text-secondary mb-3">Foto</label>
          <div class="row">
            <div class="col-3">
              <div class="">
                @if($data->image)
                <img src="{{asset('storage/photo-guru/'.$data->image) }}" class="profile-foto w-100" alt="profile">
                @else
                <img src="{{asset('img/person-circle.svg') }}" class="profile-foto w-100" alt="profile">
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
        <div class="row mb-3"  data-aos="fade-up">
          <div class="col-12 col-md-6 mb-3">
            <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->name }}">
            </div>
            @error('nama')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="col-12 col-md-6 mb-3">
            <label for="jkelamin" class="text-secondary mb-3">Jenis Kelamin</label>
            <select class="form-select form-select-sm py-2 mb-3 text-secondary" aria-label="Small select example" id="jkelamin" name="jkelamin">
              <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
              <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
          </select>
            @error('jkelamin')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3"  data-aos="fade-up">
          <div class="col-12">
            <label for="alamat" class="text-secondary mb-3">Alamat</label>
            <div class="input-group mb-2">
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
            </div>
            @error('alamat')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="row mb-3"  data-aos="fade-up">
          <div class="col-12 col-md-6">
            <label for="email" class="text-secondary mb-3">Email</label>
            <div class="input-group mb-2">
              <input type="email" class="form-control" id="email" name="email"  value="{{ $data->email }}" >
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
        <div class="row" data-aos="fade-up">
          <div class="col-12">
            <label for="matapelajaran" class="text-secondary mb-3">Mata Pelajaran</label>
            <select class="form-select form-select-sm py-2 mb-3 text-secondary" aria-label="Small select example" id="matapelajaran" name="matapelajaran">
              <option selected disabled>Pilih Mata Pelajaran</option>
              @foreach($matapelajarans as $matapelajaran)
              <option value="{{ $matapelajaran->id_mata_pelajaran }}" {{ $data->mata_pelajaran == $matapelajaran->id_mata_pelajaran ? 'selected' : '' }}>{{ $matapelajaran->nama_mata_pelajaran }}</option>
                @endforeach
            </select>
          </div>
        </div>

        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Launch demo modal
        </button> --}}

        <!-- Modal -->
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div> --}}

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
