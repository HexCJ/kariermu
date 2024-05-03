@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>Data Mata Pelajaran</h4>
        <button type="button" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#addDatamapel"><i class="fa-solid fa-chalkboard me-2"></i>Tambah Mapel</button>
      </div>
      <!-- Modal Add -->
      <div class="modal fade" id="addDatamapel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Mata Pelajaran</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- add section --}}
            <div class="modal-body">
              <form action="{{ route('mapel.input') }}" method="POST">
                @csrf
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="id_mapel" class="text-secondary mb-3">ID Mata Pelajaran</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" id="id_mapel" name="id_mapel"> 
                      </div>
                      @error('id_mata_pelajaran')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 mb-3">
                      <label for="nama_mapel" class="text-secondary mb-3">Nama Mata Pelajaran</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel">
                      </div>
                      @error('nama_mata_pelajaran')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
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
      <!-- Modal Update -->
      @foreach ($data as $d)
      <div class="modal fade" id="editDatamapel{{ $d->id_mata_pelajaran }}" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit mapel</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- add section --}}
            <div class="modal-body">
              <form action="{{ route('mapel.update', $d->id_mata_pelajaran) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="id_mapel" class="text-secondary mb-3">ID Mata Pelajaran</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="{{ $d->id_mata_pelajaran }}">
                      </div>
                      @error('id_mapel')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 mb-3">
                      <label for="nama_mapel" class="text-secondary mb-3">Nama Mata Pelajaran</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{ $d->nama_mata_pelajaran }}">
                      </div>
                      @error('nama_mapel')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center" data-bs-dismiss="modal">Edit</button>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="container-fluid px-4" data-aos="fade-up">
        <div class="row">
          <div class="col mt-3 p-0">
            <div class="card mt-3" style="min-height: 43rem">
              <div class="card-body table-responsive">
                <div class="">
                  @if ($data->isEmpty())
                  <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div><i class="bi bi-exclamation-circle me-3"></i>Data Mata Pelajaran Kosong</div>
                  </div>
                  <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 80vh" data-aos="fade-up">
                    <img class="data-kosong-kelas" src="{{ asset('img/data_kosong_mapel.png') }}" alt="">
                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Mata Pelajaran</p>
                  </div>
                  @endif
                  @if(!$data->isEmpty())
                  <table id="dataMapel" class="table table-bordered w-100 mt-3">
                    <thead>
                      <tr>
                        <th>ID mapel</th>
                        <th>Nama mapel</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $d)
                      <tr>
                        <td>{{ $d->id_mata_pelajaran }}</td> 
                        <td>{{ $d->nama_mata_pelajaran }}</td> 
                        <td class="d-flex justify-content-start align-items-center px-3">
                          <div class="dropdown py-3">
                            <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                            </a>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editDatamapel{{ $d->id_mata_pelajaran }}"><i class="fa-regular fa-pen-to-square me-2"></i>Edit</a></li>
                                <form id="formHapusMapel{{ $d->id_mata_pelajaran }}" action="{{ route('mapel.hapus', $d->id_mata_pelajaran)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="dropdown-item text-danger" id="btnHapusMapel{{ $d->id_mata_pelajaran }}">
                                      <i class="bi bi-trash3 me-2"></i>Hapus
                                  </button>
                                </form>
                                <script>
                                  document.addEventListener('DOMContentLoaded', function() {
                                      document.getElementById('btnHapusMapel{{ $d->id_mata_pelajaran }}').addEventListener('click', function() {
                                          Swal.fire({
                                              title: 'Apakah Anda yakin menghapus {{ $d->nama_mata_pelajaran}} ?',
                                              text: "Data yang dihapus tidak dapat dikembalikan!",
                                              icon: 'warning',
                                              showCancelButton: true,
                                              confirmButtonColor: '#d33',
                                              cancelButtonColor: '#3085d6',
                                              confirmButtonText: 'Ya, hapus!',
                                              cancelButtonText: 'Batal'
                                          }).then((result) => {
                                              if (result.isConfirmed) {
                                                  document.getElementById('formHapusMapel{{ $d->id_mata_pelajaran }}').submit();
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
@endsection
