@extends('layouts.app')
@section('content')
<div class="container-fluid">
  {{-- Siswa --}}
  @if (auth()->user()->hasRole('siswa'))
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex mb-3">
          <h4>Data Diri</h4>
        </div>
      <!-- Modal Update -->
      <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
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
                    <div class="col-12 col-md-6 mb-3 d-flex flex-column gap-3">
                      <label for="image" class="text-secondary ">Foto Profile</label>
                      @if($siswa->image == true)
                      <img src="{{asset('storage/photo-user/'.$siswa->image)}}" alt="profile" class="profile-foto mt-5 rounded-circle">
                      @else
                      <img src="{{asset('img/person-circle.svg')}}" alt="profile" class="profile-foto rounded-circle">
                      @endif
                      <input type="file" class="form-control mt-3" id="photo" name="photo">
                      @error('image')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 col-md-3">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                        <input type="text" disabled value="{{ $siswa->nisn }}" class="text-secondary mb-3 mt-2 p-2 card"  id="nisn" name="nisn"></input>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <input type="text" value="{{ $siswa->name }}" class="text-secondary mb-3 mt-2 p-2 card"  id="nama" name="nama"></input>
                      </div>
                      {{-- Email --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                        <input type="text" value="{{ $siswa->email }}" class="text-secondary mb-3 mt-2 p-2 card" id="email" name="email"></input>
                      </div>
                      {{-- Alamat --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <input type="text" value="{{ $siswa->alamat }}" class="text-secondary mb-3 mt-2 p-2 card" id="alamat" name="alamat"></input>
                      </div>
                      {{-- jk --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <input type="text" value="{{ $siswa->jenis_kelamin }}" class="text-secondary mb-3 mt-2 p-2 card" id="jkelamin" name="jkelamin"></input>
                      </div>
                    </div>
                    <div class="col-12 col-md-3">
                      {{-- Kelas --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-school me-2"></i>Kelas</label>
                        <input type="text" value="{{ $siswa->kelas }}" class="text-secondary mb-3 mt-2 p-2 card" id="kelas" name="kelas"></input>
                      </div>
                      {{-- Jurusan --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-user-tie me-2"></i>Jurusan</label>
                        <input type="text" value="{{ $siswa->jurusan }}" class="text-secondary mb-3 mt-2 p-2 card" id="jurusan" name="jurusan"></input>
                      </div>
                      {{-- Tahun lulus --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-calendar-days me-2"></i>Tahun Lulus</label>
                        <input type="text" value="{{ $siswa->tahun_lulus }}" class="text-secondary mb-3 mt-2 p-2 card" id="lulus" name="lulus"></input>
                      </div>
                      {{-- Tahun lulus --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-graduation-cap me-2"></i>Status</label>
                        <input type="text" value="{{ $siswa->status }}"  id="status" name="status" class="text-secondary mb-3 mt-2 p-2 card"></input>
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
        <div class="container-fluid"  data-aos="fade-up">
          <div class="row">
            <div class="col-12 col-sm-5 col-md-4 col-xl-3">
              <div class="card mt-3 border shadow">
                <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                  @if($siswa->image == true)
                  <img src="{{asset('storage/photo-user/'.$siswa->image)}}" alt="profile" class="profile-foto rounded-circle">
                  @else
                  <img src="{{asset('img/person-circle.svg')}}" alt="profile" class="profile-foto rounded-circle">
                  <div class="alert alert-warning mt-3 w-100">
                    <strong  data-aos="fade-up">Profile Picture Kosong !</strong>
                    <p class="mt-2 mb-0">Tambahkan<a href="" class="alert-link cursor-pointer" data-bs-toggle="modal" data-bs-target="#editProfile"> disini</a></p>
                  </div>
                  @endif
                  <p class="fw-bold m-0 mb-2 text-center mt-3">{{ $siswa->name }}</p>
                  <p class="text-center">{{ $siswa->email }}</p>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-7 col-md-8 col-xl-9">
              <div class="card mt-3 border shadow">
                <div class="card-body">
                  <h4 class="mb-3">Personal Information</h4>
                  <h4 class="mb-3 border-bottom"></h4>
                  <div class="data-profile row px-5 py-3">
                    <div class="col-12 col-md-6">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->nisn }}</p>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->name }}</p>
                      </div>
                      {{-- Email --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->email }}</p>
                      </div>
                      {{-- Alamat --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->alamat }}</p>
                      </div>
                      {{-- jk --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->jenis_kelamin }}</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      {{-- Kelas --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-school me-2"></i>Kelas</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->kelas }}</p>
                      </div>
                      {{-- Jurusan --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tie me-2"></i>Jurusan</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->jurusan }}</p>
                      </div>
                      {{-- Tahun lulus --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-calendar-days me-2"></i>Tahun Lulus</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->tahun_lulus }}</p>
                      </div>
                      {{-- Tahun lulus --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-graduation-cap me-2"></i>Status</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $siswa->status }}</p>
                      </div>
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
  {{-- Guru --}}
  @if (auth()->user()->hasRole('guru'))
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex mb-3">
          <h4>Data Diri</h4>
        </div>
      <!-- Modal Update -->
      <div class="modal fade" id="editProfileGuru" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Update section --}}
            <div class="modal-body">
              <form action="{{ route('profile.updateguru', ['id' => $guru->nip]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-md-6 mb-3 d-flex flex-column gap-3">
                      <label for="image" class="text-secondary ">Foto Profile</label>
                      @if($guru->image == true)
                      <img src="{{asset('storage/photo-guru/'.$guru->image)}}" alt="profile" class="profile-foto mt-5 rounded-circle">
                      @else
                      <img src="{{asset('img/person-circle.svg')}}" alt="profile" class="profile-foto rounded-circle">
                      @endif
                      <input type="file" class="form-control mt-3" id="photo" name="photo">
                      @error('image')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 col-md-6">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-id-card me-2"></i>NIP</label>
                        <input type="text" disabled value="{{ $guru->nip }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="nip" name="nip"></input>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <input type="text" value="{{ $guru->name }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="nama" name="nama"></input>
                      </div>
                      {{-- Email --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                        <input type="text" value="{{ $guru->email }}" class="text-secondary mb-3 mt-2 p-2 card w-100"  id="email" name="email"></input>
                      </div>
                      {{-- Alamat --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <input type="text" value="{{ $guru->alamat }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="alamat" name="alamat"></input>
                      </div>
                      {{-- jk --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <input type="text" value="{{ $guru->jenis_kelamin }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="jkelamin" name="jkelamin"></input>
                      </div>
                      {{-- mapel --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-chalkboard me-2"></i>Mapel</label>
                        <input type="text" value="{{ $guru->mapel }}" class="text-secondary mb-3 mt-2 p-2 card w-100" id="mapel" name="mapel"></input>
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
        <div class="container-fluid"  data-aos="fade-up">
          <div class="row">
            <div class="col-12 col-sm-5 col-md-4 col-xl-3">
              <div class="card mt-3 border shadow">
                <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                  @if($guru->image == true)
                  <img src="{{asset('storage/photo-guru/'.$guru->image)}}" alt="profile" class="profile-foto rounded-circle">
                  @else
                  <img src="{{asset('img/person-circle.svg')}}" alt="profile" class="profile-foto rounded-circle">
                  <div class="alert alert-warning mt-3 w-100">
                    <strong  data-aos="fade-up">Profile Picture Kosong !</strong>
                    <p class="mt-2 mb-0">Tambahkan<a href="" class="alert-link cursor-pointer" data-bs-toggle="modal" data-bs-target="#editProfileGuru"> disini</a></p>
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
                  <div class="data-profile row px-5 py-3">
                    <div class="col-12 col-md-6">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-id-card me-2"></i>NIP</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $guru->nip }}</p>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $guru->name }}</p>
                      </div>
                      {{-- Email --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-envelope me-2"></i>Email</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $guru->email }}</p>
                      </div>
                      {{-- Alamat --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $guru->alamat }}</p>
                      </div>
                      {{-- jk --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-venus-mars me-2"></i>Jenis Kelamin</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $guru->jenis_kelamin }}</p>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      {{-- Kelas --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-chalkboard me-2"></i>Mata Pejaran</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $guru->mata_pelajaran }}</p>
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
  </div>
  @endif
  {{-- Admin --}}
  @if (auth()->user()->hasRole('admin'))
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex mb-3">
          <h4>Data Diri</h4>
        </div>
      <!-- Modal Update -->
      <div class="modal fade" id="editProfileAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- Update section --}}
            <div class="modal-body">
              <form action="{{ route('profile.updateadmin', ['id' => $admin->id_admin]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 col-md-6 mb-3 d-flex flex-column gap-3">
                      <label for="image" class="text-secondary ">Foto Profile</label>
                      @if($admin->image == true)
                      <img src="{{asset('storage/photo-admin/'.$admin->image)}}" alt="profile" class="profile-foto mt-5 rounded-circle">
                      @else
                      <img src="{{asset('img/person-circle.svg')}}" alt="profile" class="profile-foto rounded-circle">
                      @endif
                      <input type="file" class="form-control mt-3" id="photo" name="photo">
                      @error('image')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 col-md-3">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-id-card me-2"></i>ID Admin</label>
                        <input disabled type="text" value="{{ $admin->id_admin }}" class="text-secondary mb-3 mt-2 p-2 card" id="id_admin" name="id_admin"></input>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <input type="text" value="{{ $admin->name }}" class="text-secondary mb-3 mt-2 p-2 card" id="nama" name="nama"></input>
                      </div>
                      <div class="form-group mb-4">
                        <label for="email" class="text-secondary"><i class="fa-solid fa-user-tag me-2"></i>email </label>
                        <input type="text" value="{{ $admin->email }}" class="text-secondary mb-3 mt-2 p-2 card" id="email" name="email"></input>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="text-secondary"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <input type="text" value="{{ $admin->alamat }}" class="text-secondary mb-3 mt-2 p-2 card" id="alamat" name="alamat"></input>
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
        <div class="container-fluid" data-aos="fade-up">
          <div class="row">
            <div class="col-12 col-sm-5 col-md-4 col-xl-3">
              <div class="card mt-3 border shadow">
                <div class="card-body d-flex justify-content-center align-items-center flex-column gap-2">
                  @if($admin->image == true)
                  <img src="{{asset('storage/photo-admin/'.$admin->image)}}" alt="profile" class="profile-foto rounded-circle">
                  @else
                  <img src="{{asset('img/person-circle.svg')}}" alt="profile" class="profile-foto rounded-circle">
                  <div class="alert alert-warning mt-3 w-100">
                    <strong  data-aos="fade-up">Profile Picture Kosong !</strong>
                    <p class="mt-2 mb-0">Tambahkan<a href="" class="alert-link cursor-pointer" data-bs-toggle="modal" data-bs-target="#editProfileAdmin"> disini</a></p>
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
                  <div class="data-profile row px-5 py-3">
                    <div class="col-12">
                      {{-- NISN --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-id-card me-2"></i>ID Admin</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $admin->id_admin }}</p>
                      </div>
                      {{-- Nama --}}
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $admin->name }}</p>
                      </div>
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-user-tag me-2"></i>Email</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $admin->email }}</p>
                      </div>
                      <div class="form-group mb-4">
                        <label for="nama" class="h5"><i class="fa-solid fa-location-dot me-2"></i>Alamat</label>
                        <p class="text-secondary mb-3 mt-2 p-2 card">{{ $admin->alamat }}</p>
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
</div>
@endsection