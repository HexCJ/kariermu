@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Data Users</h4>
          {{-- <a href="{{ route('tambah_users') }}" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Users</a> --}}
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
                      <div><i class="bi bi-exclamation-circle me-3"></i>Data Users Kosong</div>
                    </div>
                    <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 80vh" data-aos="fade-up">
                      <img class="data-kosong" src="{{ asset('img/data_kosong.png') }}" alt="">
                      <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Users</p>
                    </div>
                    @endif
                    @if(!$data->isEmpty())
                    <table id="dataUser" class="table table-bordered w-100 mt-3">
                      <thead>
                        <tr>
                          <th>NISN</th>
                          <th>NIP</th>
                          <th>id_admin</th>
                          <th>Nama</th>
                          <th>Role</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                        @foreach($data as $d)
                        <tr>
                          <td>{{ $d->nisn }}</td> 
                          <td>{{ $d->nip }}</td> 
                          <td>{{ $d->id_admin }}</td> 
                          <td>{{ $d->name }}</td> 
                          @if($d->role === 'Siswa')
                          <td>
                            <div class="m-0 mt-3 alert alert-danger p-1 text-center">
                              <p class="alert-link m-0 p-0" style="font-size: 10px">{{ $d->role }}</p>
                            </div>
                          </td>
                          @elseif($d->role === 'Guru')
                          <td>
                            <div class="m-0 mt-3 alert alert-primary p-1 text-center">
                              <p class="alert-link m-0 p-0" style="font-size: 10px">{{ $d->role }}</p>
                            </div>
                          </td>
                          @elseif($d->role === 'Admin')
                          <td>
                            <div class="m-0 mt-3 alert alert-success p-1 text-center">
                              <p class="alert-link m-0 p-0" style="font-size: 10px">{{ $d->role }}</p>
                            </div>
                          </td>
                          @endif
                          <td class="d-flex justify-content-center align-items-center">
                            <div class="dropdown py-3">
                              <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ route('users.edit',['id' => $d->id]) }}" class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
                                <li>
                                  <form id="hapus-users-{{ $d->id }}" action="{{ route('users.hapus', $d->id) }}" method="POST">
                                    <button type="button" id="btnHapusUsers{{ $d->id }}" class="dropdown-item text-danger">
                                      <i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                  <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        document.getElementById('btnHapusUsers{{ $d->id }}').addEventListener('click', function() {
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
                                                    document.getElementById('hapus-users-{{ $d->id }}').submit();
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
