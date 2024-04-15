@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>Data Jurusan</h4>
        <button type="button" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#addDataJurusan"><i class="fa-solid fa-school-flag me-2"></i>Tambah Jurusan</button>
      </div>
      <!-- Modal Add -->
      <div class="modal fade" id="addDataJurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jurusan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- add section --}}
            <div class="modal-body">
              <form action="{{ route('data-kelas.input') }}" method="POST">
                @csrf
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="id_jurusan" class="text-secondary mb-3">ID Jurusan</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" id="id_jurusan" name="id_jurusan">
                      </div>
                      @error('id_jurusan')
                      <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="col-12 mb-3">
                      <label for="nama_jurusan" class="text-secondary mb-3">Nama Jurusan</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan">
                      </div>
                      @error('nama_jurusan')
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
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col mt-3 p-0">
            <div class="card mt-3" style="min-height: 43rem">
              <div class="card-body table-responsive">
                
                <div class="">
                  <table id="dataSiswa" class="table table-bordered w-100 mt-3">
                    <thead>
                      <tr>
                        <th>ID Jurusan</th>
                        <th>Nama Jurusan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $d)
                      <tr>
                        <!-- Modal Update -->
                        <div class="modal fade" id="editDatamapel{{ $d->id_jurusan }}" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Mata Pelajaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              {{-- edit section --}}
                              <div class="modal-body">
                                <form action="{{ route('data-kelas.update', $d->id_jurusan) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-12 mb-3">
                                        <label for="id_mapel" class="text-secondary mb-3">ID Mata Pelajaran</label>
                                        <div class="input-group mb-2">
                                          <input type="text" class="form-control" id="id_jurusan" name="id_jurusan" value="{{ $d->id_jurusan }}">
                                        </div>
                                        @error('id_jurusan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                      </div>
                                      <div class="col-12 mb-3">
                                        <label for="nama_jurusan" class="text-secondary mb-3">Nama Mata Pelajaran</label>
                                        <div class="input-group mb-2">
                                          <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="{{ $d->nama_jurusan }}">
                                        </div>
                                        @error('nama_jurusan')
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
                        <td>{{ $d->id_jurusan }}</td> 
                        <td>{{ $d->nama_jurusan }}</td> 
                        <td class="d-flex justify-content-end align-items-center">
                          <div class="dropdown py-3">
                            <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editDatamapel{{ $d->id_jurusan }}"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                <form  action="{{ route('data-kelas.hapus' , $d->id_jurusan)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="dropdown-item text-danger"><i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus</button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      {{-- <tr>
                        <td>RPL</td> 
                        <td>Rekayasa Perangkat Lunak</td> 
                        <td class="d-flex justify-content-end align-items-center">
                          <div class="dropdown py-3">
                            <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                              <li>
                                <a href="#" class="dropdown-item text-danger">
                                  <i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus
                                </a>
                              </li>
                            </ul>
                          </div>
                        </td>
                      </tr> --}}
                    </tbody>
                  </table>
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