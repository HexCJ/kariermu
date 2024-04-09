@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Data Siswa</h4>
          <a href="/siswa/tambah" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah siswa</a>
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
                <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari siswa berdasarkan NIP atau Nama">
              </div>
              <div class="card mt-3" style="height: 43rem">
                <div class="card-body table-responsive">
                  
                  <div class="">
                    <table id="dataSiswa" class="table table-bordered w-100 mt-3">
                      <thead>
                        <tr>
                          <th>NISN</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Kejuruan</th>
                          <th>Kelas</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Alamat</th>
                          <th>Tahun Lulus</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($data as $d)
                        <tr>
                          <td>{{ $d->nisn }}</td> 
                          <td>{{ $d->name }}</td> 
                          <td>{{ $d->jenis_kelamin }}</td> 
                          <td>{{ $d->jurusan }}</td> 
                          <td>{{ $d->kelas }}</td> 
                          <td>{{ $d->email }}</td> 
                          <td>{{ $d->password }}</td> 
                          <td>{{ $d->alamat }}</td> 
                          <td>{{ $d->tahun_lulus }}</td> 
                          <td>{{ $d->status }}</td> 
                          <td class="d-flex justify-content-center align-items-center">
                            <div class="dropdown py-3">
                              <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ route('user.edit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                <li>
                                  <a href="#" class="dropdown-item text-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this data?')) { document.getElementById('hapus-siswa-{{ $d->id }}').submit(); }">
                                    <i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus
                                  </a>
                                  <form id="hapus-siswa-{{ $d->id }}" action="{{ route('siswa.hapus', ['id' => $d->id]) }}" method="POST" style="display: none;">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        @endforeach
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
