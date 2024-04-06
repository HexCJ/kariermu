@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Data Guru</h4>
          <a href="/guru/tambah" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Guru</a>
        </div>
        <div class="container-fluid px-4">
          <div class="row">
            <div class="col p-0">
              <div class="input-group mb-3 mt-3">
                <div class="dropdown">
                  <button class="btn dropdown-toggle ps-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                  <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button">A-Z</button></li>
                    <li><button class="dropdown-item" type="button">Z-A</button></li>
                    <li><button class="dropdown-item" type="button">Kejuruan</button></li>
                    <li><button class="dropdown-item" type="button">Tahun Ajaran</button></li>
                  </ul>
                </div>
                <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari guru berdasarkan NIP atau Nama">
              </div>
              <div class="card mt-3" style="height: 43rem">
                <div class="card-body table-responsive">
                  {{-- empty --}}
                  <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center text-secondary h-100">
                    <h3 class="fw-medium">Data Guru Tidak Ada</h3>
                    <h5 class="">Segera Isi Tambah Guru</h5>
                  </div>
                  {{-- @endempty --}}

                  {{-- ada --}}
                  <div class="d-none">
                    <table id="dataguru" class="table table-bordered w-100 mt-3">
                      <thead>
                        <tr>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th>Kejuruan</th>
                          <th>Mata Pelajaran</th>
                          <th>Mengajar Kelas</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- <tr>
                          <td>3671800912</td>
                          <td>Cahyo Kusumo</td>
                          <td>Rekayasa Perangkat Lunak (RPL)</td>
                          <td>2022</td>
                          <td>KULIAH</td>
                          <td class="d-flex justify-content-center align-items-center">
                            <div class="dropdown py-3">
                              <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="/guru/edit" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                <li>
                                  <a href="/" class="dropdown-item text-danger"><i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus</a>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr> --}}
                        <tr>
                          <td>3671800912</td>
                          <td>Cahyo Kusumo</td>
                          <td>Rekayasa Perangkat Lunak (RPL)</td>
                          <td>Matematika</td>
                          <td>XI RPL 1</td>
                          <td class="py-4 py-lg-3 d-flex flex-column flex-md-row gap-4 gap-md-3">
                            <a href="/guru/edit" class="button py-2 px-3 rounded text-decoration-none text-center"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a>
                            <a href="/" class="button-reset py-2 px-3 rounded text-decoration-none text-center"><i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus</a>
                          </td>
                        </tr>
                        <tr>
                          <td>3671800912</td>
                          <td>Cahyo Kusumo</td>
                          <td>Rekayasa Perangkat Lunak (RPL)</td>
                          <td>Matematika</td>
                          <td>XI RPL 1</td>
                          <td class="py-4 py-lg-3 d-flex flex-column flex-md-row gap-4 gap-md-3">
                            <a href="/guru/edit" class="button py-2 px-3 rounded text-decoration-none text-center"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a>
                            <a href="/" class="button-reset py-2 px-3 rounded text-decoration-none text-center"><i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus</a>
                          </td>
                        </tr>
                        <tr>
                          <td>3671800912</td>
                          <td>Cahyo Kusumo</td>
                          <td>Rekayasa Perangkat Lunak (RPL)</td>
                          <td>Matematika</td>
                          <td>XI RPL 1</td>
                          <td class="py-4 py-lg-3 d-flex flex-column flex-md-row gap-4 gap-md-3">
                            <a href="/guru/edit" class="button py-2 px-3 rounded text-decoration-none text-center"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a>
                            <a href="/" class="button-reset py-2 px-3 rounded text-decoration-none text-center"><i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  {{-- gak ada --}}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection