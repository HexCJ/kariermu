@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>Data Guru</h4>
      </div>
      <div class="container-fluid px-4" data-aos="fade-up">
        <div class="row">
          <div class="col p-0">
            <form action="{{ route('guru') }}" method="GET">
              <div class="row mt-3">
                <div class="col-6 col-md-5">
                  <div class="input-group mb-3 mt-3">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="rounded form-select">
                      <option value="" multiple aria-label="Multiple select example">Semua Jenis Kelamin</option>
                      <option value="Laki-laki" {{ request()->input('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                      <option value="Perempuan" {{ request()->input('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-6 col-md-5">
                  <div class="input-group mb-3 mt-3">
                    <select name="mata_pelajaran" id="mata_pelajaran" class="rounded form-select">
                      <option value="" multiple aria-label="Multiple select example">Semua Mata Pelajaran</option>
                      @foreach($matapelajarans as $matapelajaran)
                          <option value="{{ $matapelajaran->id_mata_pelajaran }}" {{ request()->input('mata_pelajaran') == $matapelajaran->id_mata_pelajaran ? 'selected' : '' }}>{{ $matapelajaran->nama_mata_pelajaran }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-12 col-sm-12 col-md-2 mb-2 d-flex justify-content-end py-3 text-center">
                  <button type="submit" class="btn btn-primary w-100 w-sm-50"><i class="fa-solid fa-sort me-2"></i>Sortir Data Guru</button>
                </div>
              </div>
            </form>
            <div class="card mt-3 table-responsive" style="min-height: 43rem">
              <div class="card-body">
                <div class="">
                  @if ($data->isEmpty())
                  <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div><i class="bi bi-exclamation-circle me-3"></i>Data Guru Kosong</div>
                  </div>
                  <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 80vh" data-aos="fade-up">
                    <img class="data-kosong" src="{{ asset('img/data_kosong_guru.png') }}" alt="">
                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Guru</p>
                  </div>
                  @endif
                  @if(!$data->isEmpty())
                  <div class="d-flex mb-3">
                    <a href="{{ route('guru.create') }}" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Guru</a>
                    <a href="" class="ms-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-file-earmark-arrow-down me-3"></i>Import Data</a>
                  </div>
                  <table id="dataguru" class="table table-hover w-100 mt-3">
                    <thead>
                      <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        {{-- <th>Password</th> --}}
                        <th>Jenis Kelamin</th>
                        <th>Walikelas</th>
                        <th>Jurusan</th>
                        <th>Urutan Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $d)
                      <tr>
                        <td>{{ $d->nip }}</td> 
                        <td>{{ $d->name }}</td> 
                        <td><img src="{{asset('storage/photo-guru/'.$d->image)}}" alt="" style="width:100px"></td> 
                        <td>{{ $d->alamat }}</td> 
                        <td>{{ $d->email }}</td> 
                        {{-- <td>{{ $d->password }}</td>  --}}
                        <td>{{ $d->jenis_kelamin }}</td>
                        <td>{{ $d->walikelas }}</td> 
                        <td>{{ $d->jurusan }}</td> 
                        <td>{{ $d->urutan_kelas }}</td> 
                        <td>{{ $d->mata_pelajaran }}</td>
                        <td class="d-flex justify-content-center align-items-center">
                          <div class="dropdown py-3">
                            <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="{{ route('guru.edit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                              <li>
                                <form id="hapus-guru-{{ $d->id }}" action="{{ route('guru.hapus', $d->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" id="btnHapusGuru{{ $d->id }}" class="dropdown-item text-danger">
                                    <i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus
                                  </button>
                                </form>
                              </li>       
                                <script>
                                  document.addEventListener('DOMContentLoaded', function() {
                                      document.getElementById('btnHapusGuru{{ $d->id }}').addEventListener('click', function() {
                                          Swal.fire({
                                              title: 'Apakah Anda yakin menghapus {{ $d->name}} ?',
                                              text: "Data yang dihapus tidak dapat dikembalikan!",
                                              icon: 'warning',
                                              showCancelButton: true,
                                              confirmButtonColor: '#d33',
                                              cancelButtonColor: '#3085d6',
                                              confirmButtonText: 'Ya, hapus!',
                                              cancelButtonText: 'Batal'
                                          }).then((result) => {
                                              if (result.isConfirmed) {
                                                  document.getElementById('hapus-guru-{{ $d->id }}').submit();
                                              }
                                          });
                                      });
                                  });
                                </script>
                              </li>                    
                            </ul>
                          </div>
                        </td>
                      </tr>
                        @endforeach
                    </tbody>
                  </table>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data Guru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('guru.import') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <div class="form-group">
            <input type="file" name="guru_excel" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection