@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  {{-- Siswa --}}
  @if (auth()->user()->hasRole('siswa'))
    <!-- Modal Update -->
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- Update section --}}
          <div class="modal-body">
            <form action="{{ route('profile.updatesiswa', ['id' => $siswa->nisn]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6">
                    {{-- NISN --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                      <input type="text" required readonly value="{{ $siswa->nisn }}" class="text-secondary mb-3 mt-2 p-2 card w-100"  id="nisn" name="nisn" placeholder=""></input>
                    </div>
                    {{-- Nama --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                      <input type="text" required value="{{ $siswa->name }}" class="text-secondary mb-3 mt-2 p-2 card w-100"  id="nama" name="nama" placeholder="ex : Sucipto Darmono"></input>
                    </div>
                    {{-- Email --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-envelope me-2"></i>Email</label>
                      <input type="email" required value="{{ $siswa->email }}" class=" mb-3 mt-2 p-2 card w-100" id="email" name="email" placeholder="ex : suciptodarmono12@example.com"></input>
                    </div>
                    {{-- Alamat --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                      <input type="text" required value="{{ $siswa->alamat }}" class=" mb-3 mt-2 p-2 card w-100" id="alamat" name="alamat" placeholder="ex : Jl.Prabu No.12A Kel.Gembor Kec.Periuk Kota Tangerang"></input>
                    </div>
                    {{-- jk --}}
                    <div class="form-group mb-4">
                      <label for="jkelamin" class=""><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3 " aria-label="Small select example" id="jkelamin" name="jkelamin">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                          <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                      </select>
                      @error('jkelamin')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    {{-- Kelas --}}
                    {{-- jk --}}
                    <div class="form-group mb-4">
                      <label for="kelas" class=""><i class="fa-solid fa-school me-2"></i>Kelas</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3  w-100" aria-label="Small select example" id="kelas" name="kelas">
                        <option value="">Pilih Kelas</option>
                        <option value="X" {{ $siswa->kelas == 'X' ? 'selected' : '' }}>X/SEPULUH</option>
                        <option value="XI" {{ $siswa->kelas == 'XI' ? 'selected' : '' }}>XI/SEBELAS</option>
                        <option value="XII" {{ $siswa->kelas == 'XII' ? 'selected' : '' }}>XII/DUA BELAS</option>
                      </select>
                      @error('kelas')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group mb-4">
                      <label for="jurusan" class=""><i class="fa-solid fa-school-flag me-2"></i>Jurusan</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3  w-100" aria-label="Small select example" id="jurusan" name="jurusan">
                        <option value="">Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                          <option value="{{ $jurusan->id_jurusan }}" {{ $siswa->jurusan == $jurusan->id_jurusan ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                      </select>
                      @error('jurusan')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    {{-- Tahun lulus --}}
                    <div class="form-group mb-4" id="urutan_kelas">
                      <label for="urutan_kelas" class=""><i class="fa-solid fa-list-ol me-2"></i>Urutan Kelas</label>
                      <input type="text" value="{{ $siswa->urutan_kelas }}" class=" mb-3 mt-2 p-2 card w-100" name="urutan_kelas" placeholder="ex : 1"></input>
                    </div>
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-graduation-cap me-2"></i>Status</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3  w-100" aria-label="Small select example" id="status" name="status">
                        <option value="">Pilih Status Anda</option>
                        <option value="Belum Lulus" {{ $siswa->status == 'Belum Lulus' ? 'selected' : '' }}>Siswa Aktif</option>
                        <option value="Lulus" {{ $siswa->status == 'Lulus' ? 'selected' : '' }}>Alumni</option>
                      </select>
                    </div>
                    <script>
                      document.addEventListener("DOMContentLoaded", function() {
                          var statusSelect = document.getElementById('status');
                          var tahunLulusInput = document.getElementById('lulus');
                      
                          // Sembunyikan input tahun lulus saat halaman dimuat
                          tahunLulusInput.style.display = 'none';
                      
                          // Tambahkan event listener untuk perubahan pada select status
                          statusSelect.addEventListener('change', function() {
                              if (statusSelect.value === 'Lulus') {
                                  // Jika status Alumni dipilih, tampilkan input tahun lulus
                                  tahunLulusInput.style.display = 'block';
                              } else {
                                  // Jika status Siswa Aktif dipilih, sembunyikan input tahun lulus
                                  tahunLulusInput.style.display = 'none';
                              }
                          });
                      });
                      </script>
                    {{-- Tahun lulus --}}
                    <div class="form-group mb-4" id="lulus">
                      <label for="nama" class=""><i class="fa-solid fa-calendar-days me-2"></i>Tahun Lulus</label>
                      <input type="text" value="{{ $siswa->tahun_lulus }}" class=" mb-3 mt-2 p-2 card w-100" name="lulus" placeholder="ex : 2024"></input>
                    </div>
                  </div>
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
    <!-- Modal Profile -->
    <div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- Update section --}}
          <div class="modal-body">
            <form action="{{ route('profile.foto', ['id' => $siswa->nisn]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 mb-3 d-flex flex-column gap-3">
                    <div class="d-flex justify-content-center align-items-center flex-column gap-3">
                      @if($siswa->image == true)
                      <img src="{{asset('storage/photo-user/'.$siswa->image)}}" alt="profile" class="profile-foto">
                      @elseif($siswa->jenis_kelamin === 'Laki-laki')
                      <img src="{{asset('img/sma_profile1.png')}}" alt="profile" class="profile-foto">
                      @elseif($siswa->jenis_kelamin === 'Perempuan')
                      <img src="{{asset('img/sma_profile2.png')}}" alt="profile" class="profile-foto">
                      @endif
                      <input type="file" class="form-control mt-3" id="photo" name="photo">
                      @error('image')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
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
    @if ($siswa->kelas == false)
      <div class="row">
        <div class="col-12 mt-4">
            <div class="d-flex mb-3">
              <h4>Data Diri</h4>
              <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto" data-bs-toggle="modal" data-bs-target="#editProfile"><i class="fa-solid fa-user-pen fa-fw me-2"></i>Data Profile</a>
            </div>
        </div>
      </div>
      <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 90vh" data-aos="fade-up">
        <img class="data-kosong" src="{{ asset('img/data_kosong.png') }}" alt="">
        <p class="fw-semibold mt-5 mb-0">Data Profile Anda Kosong</p>
        <p class="fw-medium mt-3 mb-0"><a href="" data-bs-toggle="modal" data-bs-target="#editProfile">Isi</a> Terlebih Dahulu</p>
      </div>
    @endif
    @if($siswa->kelas)
    <div class="row">
      <div class="col-12 mt-4">
        <div class="d-flex mb-3">
          <h4>Data Diri</h4>
        </div>
            <div class="container-fluid" data-aos="fade-up">
              <div class="row">
                <div class="col-12 col-sm-5 col-md-4 col-xl-3">
                  <div class="card mt-3 border shadow">
                    <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                      @if($siswa->image == true)
                      <div class="position-relative d-flex justify-content-center">
                        <img src="{{asset('storage/photo-user/'.$siswa->image)}}" alt="profile" class="profile-foto">
                        <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                          <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                        </div>
                      </div>
                      @elseif($siswa->jenis_kelamin === 'Laki-laki')
                      <div class="position-relative d-flex justify-content-center">
                        <img src="{{asset('img/sma_profile1.png')}}" alt="profile" class="profile-foto">
                        <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                          <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                        </div>
                      </div>
                      <div class="alert alert-warning mt-3 w-100">
                        <strong  data-aos="fade-up"><i class="bi bi-exclamation-triangle-fill me-2"></i>Profile Picture Kosong !</strong>
                      </div>
                      @elseif($siswa->jenis_kelamin === 'Perempuan')
                      <div class="position-relative d-flex justify-content-center">
                        <img src="{{asset('img/sma_profile2.png')}}" alt="profile" class="profile-foto">
                        <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                          <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                        </div>
                      </div>
                      <div class="alert alert-warning mt-3 w-100">
                        <strong  data-aos="fade-up"><i class="bi bi-exclamation-triangle-fill me-2"></i>Profile Picture Kosong !</strong>
                      </div>
                      @endif
                      <p class="fw-bold m-0 mb-2 text-center">{{ $siswa->name }}</p>
                      <p class="text-center">{{ $siswa->email }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-7 col-md-8 col-xl-9">
                  <div class="card mt-3 border shadow">
                    <div class="card-body">
                      <h4 class="mb-3">Personal Information</h4>
                      <h4 class="mb-3 border-bottom"></h4>
                      <div class="data-profile row px-2 px-md-5 py-3">
                        <div class="col-12 col-md-6">
                          {{-- NISN --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->nisn }}</p>
                          </div>
                          {{-- Nama --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->name }}</p>
                          </div>
                          {{-- Email --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->email }}</p>
                          </div>
                          {{-- Alamat --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->alamat }}</p>
                          </div>
                          {{-- jk --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->jenis_kelamin }}</p>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          {{-- Kelas --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-school me-2"></i>Kelas</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->kelas }}</p>
                          </div>
                          {{-- Jurusan --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-school-flag me-2"></i>Jurusan</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->jurusan }}</p>
                          </div>
                          <div class="form-group mb-4">
                            <label for="urutan_kelas" class="fw-semibold"><i class="fa-solid fa-list-ol me-2"></i>Urutan Kelas</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->urutan_kelas }}</p>
                          </div>
                          
                          {{-- Tahun lulus --}}
                          <div class="form-group mb-4">
                            <label for="nama" class="fw-semibold"><i class="fa-solid fa-graduation-cap me-2"></i>Status</label>
                            <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->status }}</p>
                          </div>
                          @if($siswa->tahun_lulus)
                            {{-- Tahun lulus --}}
                            <div class="form-group mb-4">
                              <label for="nama" class="fw-semibold"><i class="fa-solid fa-calendar-days me-2"></i>Tahun Lulus</label>
                              <p class=" mb-3 mt-2 p-2 card w-100">{{ $siswa->tahun_lulus }}</p>
                            </div>
                          @endif
                        </div>
                        <div class="d-flex justify-content-end">
                          <p class=""><a href="" class="cursor-pointer btn btn-success" data-bs-toggle="modal" data-bs-target="#editProfile"><i class="fa-regular fa-pen-to-square"></i></a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    @endif
  @endif
    {{-- Guru --}}
  @if (auth()->user()->hasRole('guru'))
    <!-- Modal Update -->
    <div class="modal fade" id="editProfileGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- Update section --}}
          <div class="modal-body">
            <form action="{{ route('profile.updateguru', ['id' => $guru->nip]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-6">
                    {{-- NISN --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-id-card me-2"></i>NIP</label>
                      <input type="text" readonly value="{{ $guru->nip }}" class="text secondary mb-3 mt-2 p-2 card w-100 w-100" id="nip" name="nip"></input>
                    </div>
                    {{-- Nama --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                      <input type="text"  value="{{ $guru->name }}" class="text-secondary mb-3 mt-2 p-2 card w-100 w-100" id="nama" name="nama" placeholder="ex : Sucipto Darmono"></input>
                    </div>
                    {{-- Email --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-envelope me-2"></i>Email</label>
                      <input type="email" value="{{ $guru->email }}" class="mb-3 mt-2 p-2 card w-100 w-100"  id="email" name="email"  placeholder="ex : suciptodarmono12@example.com"></input>
                    </div>
                    {{-- Alamat --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                      <input type="text" value="{{ $guru->alamat }}" class="mb-3 mt-2 p-2 card w-100 w-100" id="alamat" name="alamat" placeholder="ex : Jl.Prabu No.12A Kel.Gembor Kec.Periuk Kota Tangerang"></input>
                    </div>
                    {{-- jk --}}
                    <div class="form-group mb-4">
                      <label for="jkelamin" class=""><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3 " aria-label="Small select example" id="jkelamin" name="jkelamin">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki" {{ $guru->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                          <option value="Perempuan" {{ $guru->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                      </select>
                      @error('jkelamin')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group mb-4">
                      <label for="kelas" class=""><i class="fa-solid fa-chalkboard-user me-2"></i>Walikelas</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3  w-100" aria-label="Small select example" id="kelas" name="kelas">
                        <option value="">Pilih Kelas</option>
                        <option value="X" {{ $guru->walikelas == 'X' ? 'selected' : '' }}>X/SEPULUH</option>
                        <option value="XI" {{ $guru->walikelas == 'XI' ? 'selected' : '' }}>XI/SEBELAS</option>
                        <option value="XII" {{ $guru->walikelas == 'XII' ? 'selected' : '' }}>XII/DUA BELAS</option>
                      </select>
                      @error('kelas')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group mb-4">
                      <label for="jurusan" class=""><i class="fa-solid fa-school-flag me-2"></i>Jurusan</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3  w-100" aria-label="Small select example" id="jurusan" name="jurusan">
                        <option value="">Pilih Jurusan</option>
                        @foreach ($jurusans as $jurusan)
                          <option value="{{ $jurusan->id_jurusan }}" {{ $guru->jurusan == $jurusan->id_jurusan ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                      </select>
                      @error('jurusan')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    {{-- Tahun lulus --}}
                    <div class="form-group mb-4" id="urutan_kelas">
                      <label for="urutan_kelas" class=""><i class="fa-solid fa-list-ol me-2"></i>Urutan Kelas</label>
                      <input type="text" value="{{ $guru->urutan_kelas }}" class=" mb-3 mt-2 p-2 card w-100" name="urutan_kelas" placeholder="ex : 1"></input>
                    </div>
                    <div class="form-group mb-4">
                      <label for="matapelajaran" class=""><i class="fa-solid fa-chalkboard me-2"></i>Mapel</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3  w-100" aria-label="Small select example" id="matapelajaran" name="matapelajaran">
                        <option value="">Pilih Mapel</option>
                        @foreach ($mapels as $mapel)
                          <option value="{{ $mapel->id_mata_pelajaran }}" {{ $guru->mata_pelajaran == $mapel->id_mata_pelajaran ? 'selected' : '' }}>{{ $mapel->nama_mata_pelajaran }}</option>
                        @endforeach
                      </select>
                      @error('matapelajaran')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
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
    <!-- Modal Profile -->
    <div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- Update section --}}
          <div class="modal-body">
            <form action="{{ route('profile.foto-guru', ['id' => $guru->nip]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 mb-3 d-flex flex-column gap-3">
                    <div class="d-flex justify-content-center align-items-center flex-column gap-3">
                      @if($guru->image == true)
                      <img src="{{asset('storage/photo-guru/'.$guru->image)}}" alt="profile" class="profile-foto">
                      @elseif($guru->jenis_kelamin === 'Laki-laki')
                      <img src="{{asset('img/sma_profile1.png')}}" alt="profile" class="profile-foto">
                      @elseif($guru->jenis_kelamin === 'Perempuan')
                      <img src="{{asset('img/sma_profile2.png')}}" alt="profile" class="profile-foto">
                      @endif
                      <input type="file" class="form-control mt-3" id="photo" name="photo">
                      @error('image')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
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
    @if ($guru->mata_pelajaran == false || $guru->walikelas == false)
      <div class="row">
        <div class="col-12 mt-4">
            <div class="d-flex mb-3">
              <h4>Data Diri</h4>
              <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto" data-bs-toggle="modal" data-bs-target="#editProfileGuru"><i class="fa-solid fa-user-pen fa-fw me-2"></i>Data Profile</a>
            </div>
        </div>
        <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 90vh" data-aos="fade-up">
          <img class="data-kosong" src="{{ asset('img/data_kosong.png') }}" alt="">
          <p class="fw-semibold mt-5 mb-0">Data Profile Anda Kosong</p>
          <p class="fw-medium mt-3 mb-0"><a href="" data-bs-toggle="modal" data-bs-target="#editProfileGuru">Isi</a> Terlebih Dahulu</p>
        </div>
      </div>
    @elseif($guru->mata_pelajaran)
    <div class="row">
      <div class="col-12 mt-4">
          <div class="d-flex mb-3">
            <h4>Data Diri</h4>
          </div>
      </div>
      <div class="container-fluid"  data-aos="fade-up">
        <div class="row">
          <div class="col-12 col-sm-5 col-md-4 col-xl-3">
            <div class="card mt-3 border shadow">
              <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                @if($guru->image == true)
                <div class="position-relative d-flex justify-content-center">
                  <img src="{{asset('storage/photo-guru/'.$guru->image)}}" alt="profile" class="profile-foto">
                  <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                    <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                  </div>
                </div>
                @elseif($guru->jenis_kelamin === 'Laki-laki')
                <div class="position-relative d-flex justify-content-center">
                  <img src="{{asset('img/sma_profile1.png')}}" alt="profile" class="profile-foto">
                  <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                    <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                  </div>
                </div>
                <div class="alert alert-warning mt-3 w-100">
                  <strong  data-aos="fade-up"><i class="bi bi-exclamation-triangle-fill me-2"></i>Profile Picture Kosong !</strong>
                </div>
                @elseif($guru->jenis_kelamin === 'Perempuan')
                <div class="position-relative d-flex justify-content-center">
                  <img src="{{asset('img/sma_profile2.png')}}" alt="profile" class="profile-foto">
                  <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                    <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                  </div>
                </div>
                <div class="alert alert-warning mt-3 w-100">
                  <strong  data-aos="fade-up"><i class="bi bi-exclamation-triangle-fill me-2"></i>Profile Picture Kosong !</strong>
                </div>
                @endif
                <p class="fw-bold m-0 mb-2 text-center mt-3">{{ $guru->name }}</p>
                <p class="text-center">{{ $guru->email }}</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-7 col-md-8 col-xl-9">
            <div class="card mt-3 border shadow">
              <div class="card-body">
                <h4 class="mb-3">Personal Information</h4>
                <h4 class="mb-3 border-bottom"></h4>
                <div class="data-profile row px-2 px-md-5 py-3">
                  <div class="col-12 col-md-6">
                    {{-- NISN --}}
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-id-card me-2"></i>NIP</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->nip }}</p>
                    </div>
                    {{-- Nama --}}
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->name }}</p>
                    </div>
                    {{-- Email --}}
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->email }}</p>
                    </div>
                    {{-- Alamat --}}
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->alamat }}</p>
                    </div>
                    {{-- jk --}}
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->jenis_kelamin }}</p>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-chalkboard-user me-2"></i>Walikelas</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->walikelas }}</p>
                    </div>
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-school-flag me-2"></i>Jurusan</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->jurusan }}</p>
                    </div>
                    <div class="form-group mb-4">
                      <label for="urutan_kelas" class="fw-semibold"><i class="fa-solid fa-list-ol me-2"></i>Urutan Kelas</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->urutan_kelas }}</p>
                    </div>
                    {{-- Kelas --}}
                    <div class="form-group mb-4">
                      <label for="nama" class="fw-semibold"><i class="fa-solid fa-chalkboard me-2"></i>Mata Pejaran</label>
                      <p class=" mb-3 mt-2 p-2 card w-100">{{ $guru->mata_pelajaran }}</p>
                    </div>
                  </div>
                  <div class="d-flex justify-content-end">
                    <p class=""><a href="" class="cursor-pointer btn btn-success" data-bs-toggle="modal" data-bs-target="#editProfileGuru"><i class="fa-regular fa-pen-to-square"></i></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    </div>
  @endif
  {{-- Admin --}}
  @if (auth()->user()->hasRole('admin'))
    <!-- Modal Update -->
    <div class="modal fade" id="editProfileAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- Update section --}}
          <div class="modal-body">
            <form action="{{ route('profile.updateadmin', ['id' => $admin->id_admin]) }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-12">
                    {{-- NISN --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-id-card me-2"></i>ID Admin</label>
                      <input readonly type="text" value="{{ $admin->id_admin }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="id_admin" name="id_admin"></input>
                    </div>
                    {{-- Nama --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                      <input type="text" value="{{ $admin->name }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="nama" name="nama"></input>
                    </div>
                    {{-- Email --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-envelope me-2"></i>Email</label>
                      <input type="email" value="{{ $admin->email }}" class=" mb-3 mt-2 p-2 card w-100" id="email" name="email"></input>
                    </div>
                    {{-- Nama --}}
                    <div class="form-group mb-4">
                      <label for="nama" class=""><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                      <input type="text" value="{{ $admin->alamat }}" class=" mb-3 mt-2 p-2 card w-100" id="alamat" name="alamat" placeholder=""></input>
                    </div>
                    <div class="form-group mb-4">
                      <label for="jkelamin" class=""><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                      <select class="form-select form-select-sm select-option-form p-2 mb-3 " aria-label="Small select example" id="jkelamin" name="jkelamin">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option value="Laki-laki" {{ $admin->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                          <option value="Perempuan" {{ $admin->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                      </select>
                      @error('jkelamin')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center" data-bs-dismiss="modal">Submit</button>
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Profile -->
    <div class="modal fade" id="editFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Foto Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          {{-- Update section --}}
          <div class="modal-body">
            <form action="{{ route('profile.foto-admin', ['id' => $admin->id_admin]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 mb-3 d-flex flex-column gap-3">
                    <div class="d-flex justify-content-center align-items-center flex-column gap-3">
                      @if($admin->image == true)
                      <img src="{{asset('storage/photo-admin/'.$admin->image)}}" alt="profile" class="profile-foto">
                      @elseif($admin->jenis_kelamin === 'Laki-laki')
                      <img src="{{asset('img/sma_profile1.png')}}" alt="profile" class="profile-foto">
                      @elseif($admin->jenis_kelamin === 'Perempuan')
                      <img src="{{asset('img/sma_profile2.png')}}" alt="profile" class="profile-foto">
                      @endif
                      <input type="file" class="form-control mt-3" id="photo" name="photo">
                      @error('image')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
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
    @if ($admin->alamat == false)
      <div class="row">
        <div class="col-12 mt-4">
            <div class="d-flex mb-3">
              <h4>Data Diri</h4>
              <a href="" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto" data-bs-toggle="modal" data-bs-target="#editProfileAdmin"><i class="fa-solid fa-user-pen fa-fw me-2"></i>Data Profile</a>
            </div>
        </div>
        <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 90vh" data-aos="fade-up">
          <img class="data-kosong" src="{{ asset('img/data_kosong.png') }}" alt="">
          <p class="fw-semibold mt-5 mb-0">Data Profile Anda Kosong</p>
          <p class="fw-medium mt-3 mb-0"><a href="" data-bs-toggle="modal" data-bs-target="#editProfile">Isi</a> Terlebih Dahulu</p>
        </div>
      </div>
      @elseif($admin->alamat)
      <div class="row">
        <div class="col-12 mt-4">
            <div class="d-flex mb-3">
              <h4>Data Diri</h4>
            </div>
          <div class="container-fluid" data-aos="fade-up">
            <div class="row">
              <div class="col-12 col-sm-5 col-md-4 col-xl-3">
                <div class="card mt-3 border shadow">
                  <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                    @if($admin->image == true)
                    <div class="position-relative d-flex justify-content-center">
                      <img src="{{asset('storage/photo-admin/'.$admin->image)}}" alt="profile" class="profile-foto">
                      <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                        <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                      </div>
                    </div>
                    @elseif($admin->jenis_kelamin === 'Laki-laki')
                    <div class="position-relative d-flex justify-content-center">
                      <img src="{{asset('img/sma_profile1.png')}}" alt="profile" class="profile-foto">
                      <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                        <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                      </div>
                    </div>
                    <div class="alert alert-warning mt-3 w-100">
                      <strong  data-aos="fade-up"><i class="bi bi-exclamation-triangle-fill me-2"></i>Profile Picture Kosong !</strong>
                    </div>
                    @elseif($admin->jenis_kelamin === 'Perempuan')
                    <div class="position-relative d-flex justify-content-center">
                      <img src="{{asset('img/sma_profile2.png')}}" alt="profile" class="profile-foto">
                      <div class="d-flex justify-content-end position-absolute" style="left: 65%;bottom:5%;">
                        <a href="" class="btn btn-primary d-flex align-items-center justify-content-center rounded-circle fs-6" style="width:30px; height:30px" data-bs-toggle="modal" data-bs-target="#editFoto"><i class="fa-solid fa-pencil"></i></a>
                      </div>
                    </div>
                    <div class="alert alert-warning mt-3 w-100">
                      <strong  data-aos="fade-up"><i class="bi bi-exclamation-triangle-fill me-2"></i>Profile Picture Kosong !</strong>
                    </div>
                    @endif
                    <p class="fw-bold m-0 mb-2 text-center mt-3">{{ $admin->name }}</p>
                    <p class="text-center">{{ $admin->email }}</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-7 col-md-8 col-xl-9">
                <div class="card mt-3 border shadow">
                  <div class="card-body">
                    <h4 class="mb-3">Personal Information</h4>
                    <h4 class="mb-3 border-bottom"></h4>
                    <div class="data-profile row px-2 px-md-5 py-3">
                      <div class="col-12">
                        {{-- NISN --}}
                        <div class="form-group mb-4">
                          <label for="nama" class="fw-semibold"><i class="fa-solid fa-id-card me-2"></i>ID Admin</label>
                          <p class=" mb-3 mt-2 p-2 card w-100">{{ $admin->id_admin }}</p>
                        </div>
                        {{-- Nama --}}
                        <div class="form-group mb-4">
                          <label for="nama" class="fw-semibold"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                          <p class=" mb-3 mt-2 p-2 card w-100">{{ $admin->name }}</p>
                        </div>
                        <div class="form-group mb-4">
                          <label for="nama" class="fw-semibold"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                          <p class=" mb-3 mt-2 p-2 card w-100">{{ $admin->email }}</p>
                        </div>
                        <div class="form-group mb-4">
                          <label for="nama" class="fw-semibold"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                          <p class=" mb-3 mt-2 p-2 card w-100">{{ $admin->alamat }}</p>
                        </div>
                        {{-- jk --}}
                        <div class="form-group mb-4">
                          <label for="nama" class="fw-semibold"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                          <p class=" mb-3 mt-2 p-2 card w-100">{{ $admin->jenis_kelamin }}</p>
                        </div>
                      </div>
                      <div class="d-flex justify-content-end">
                        <p class=""><a href="" class="cursor-pointer btn btn-success" data-bs-toggle="modal" data-bs-target="#editProfileAdmin"><i class="fa-regular fa-pen-to-square"></i></a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endif
</div>
@endsection