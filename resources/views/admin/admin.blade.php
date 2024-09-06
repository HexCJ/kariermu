@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Data Admin</h4>
        </div>
        <div class="container-fluid px-4" data-aos="fade-up">
          <div class="row">
            <div class="col p-0">
              {{-- sortir data siswa --}}
              <div class="card mt-3" style="min-height: 43rem">
                <div class="card-body table-responsive">
                  <div class="">
                    @if ($data->isEmpty())
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                      <div><i class="bi bi-exclamation-circle me-3"></i>Data Admin Kosong</div>
                    </div>
                    @endif
                    @if (!$data->isEmpty())
                    <div class="d-flex mt-3 mb-3">
                    <a href="{{ route('admin.create') }}" class="py-2 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Admin</a>
                    </div>
                    <table id="dataAdmin" class="table table-hover w-100 mt-3">
                      <thead>
                        <tr>
                          <th>ID Admin</th>
                          <th>Foto</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Jenis Kelamin</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                        @foreach($data as $d)
                        <tr>
                          <td>{{ $d->id_admin }}</td> 
                          <td><img src="{{asset('storage/photo-admin/'.$d->image)}}" alt="" style="width: 100px"></td> 
                          <td>{{ $d->name }}</td> 
                          <td>{{ $d->email }}</td> 
                          <td>{{ $d->alamat }}</td> 
                          <td>{{ $d->jenis_kelamin }}</td> 
                          <td class="d-flex justify-content-center align-items-center">
                            <div class="dropdown py-3">
                              <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.edit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                <li>
                                  <form id="hapus-admin-{{ $d->id }}" action="{{ route('admin.hapus', $d->id) }}" method="POST">
                                    <button type="button" id="btnHapusadmin{{ $d->id }}" class="dropdown-item text-danger">
                                      <i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                  <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.getElementById('btnHapusadmin{{ $d->id }}').addEventListener('click', function() {
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
                                                    document.getElementById('hapus-admin-{{ $d->id }}').submit();
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
