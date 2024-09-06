@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('partials.notification')
        @if($status === "Menganggur")
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <h4>List Siswa {{ $status }}</h4>
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <div class="card mt-3 table-responsive" style="min-height: 43rem">
                                    <div class="card-body">
                                        <div class="">
                                            @if ($data->isEmpty())
                                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                                    <div><i class="fa-regular fa-circle-check me-3"></i>Data Siswa {{ $status }} Kosong</div>
                                                </div>
                                                <div class="alert-alert-success d-flex flex-column text-center d-flex justify-content-center align-items-center"
                                                    style="height: 80vh" data-aos="fade-up">
                                                    <img class="data-kosong" src="{{ asset('img/nilai_found1.png') }}"
                                                        alt="">
                                                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Siswa Menganggur</p>
                                                </div>
                                            @endif
                                            @if (!$data->isEmpty())
                                            <div class="d-flex mb-3">
                                                <a href="{{ route('detail.tidakkerja.download') }}" class=" ms-auto btn btn-success"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                                            </div>
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Jurusan</th>
                                                            <th>Urutan Kelas</th>
                                                            <th>Status Siswa</th>
                                                            <th>Tahun Lulus</th>
                                                            <th>Status Karir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jurusan }}</td>
                                                                <td>{{ $d->urutan_kelas }}</td>
                                                                <td>{{ $d->status_siswa }}</td>
                                                                <td>{{ $d->tahun_lulus }}</td>
                                                                <td>{{ $d->status }}</td>
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
        @endif
        @if($status === "Bekerja")
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <h4>List Siswa {{ $status}}</h4>
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <div class="card mt-3 table-responsive" style="min-height: 43rem">
                                    <div class="card-body">
                                        <div class="">
                                            @if ($data->isEmpty())
                                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                    <div><i class="bi bi-exclamation-circle me-3"></i>Data {{ $status }} Kosong</div>
                                                </div>
                                                <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center"
                                                    style="height: 80vh" data-aos="fade-up">
                                                    <img class="data-kosong" src="{{ asset('img/data_kosong_guru.png') }}"
                                                        alt="">
                                                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data {{ $status }}</p>
                                                </div>
                                            @endif
                                            @if (!$data->isEmpty())
                                                <div class="d-flex mb-3">
                                                    <a href="{{ route('detail.kerja.download') }}" class=" ms-auto btn btn-success"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                                                </div>
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Jurusan</th>
                                                            <th>Urutan Kelas</th>
                                                            <th>Status Siswa</th>
                                                            <th>Tahun Lulus</th>
                                                            <th>Status Karir</th>
                                                            <th>Nama Intansi/Perusahaan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jurusan }}</td>
                                                                <td>{{ $d->urutan_kelas }}</td>
                                                                <td>{{ $d->status_siswa }}</td>
                                                                <td>{{ $d->tahun_lulus }}</td>
                                                                <td>{{ $d->status }}</td>
                                                                <td>{{ $d->tempat_kerja_kuliah }}</td>
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
        @endif
        @if($status === "Kuliah")
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <h4>List Siswa {{ $status}}</h4>
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <form action="{{ route('guru') }}" method="GET">
                                    <div class="row mt-3">
                                    </div>
                                </form>
                                <div class="card mt-3 table-responsive" style="min-height: 43rem">
                                    <div class="card-body">
                                        <div class="">
                                            @if ($data->isEmpty())
                                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                    <div><i class="bi bi-exclamation-circle me-3"></i>Data Berkuliah Kosong</div>
                                                </div>
                                                <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center"
                                                    style="height: 80vh" data-aos="fade-up">
                                                    <img class="data-kosong" src="{{ asset('img/data_kosong_guru.png') }}"
                                                        alt="">
                                                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Data Siswa Berkuliah</p>
                                                </div>
                                            @endif
                                            @if (!$data->isEmpty())
                                                <div class="d-flex mb-3">
                                                    <a href="{{ route('detail.kuliah.download') }}" class=" ms-auto btn btn-success"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                                                </div>
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Jurusan</th>
                                                            <th>Urutan Kelas</th>
                                                            <th>Status Siswa</th>
                                                            <th>Tahun Lulus</th>
                                                            <th>Status Karir</th>
                                                            <th>Nama Universitas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jurusan }}</td>
                                                                <td>{{ $d->urutan_kelas }}</td>
                                                                <td>{{ $d->status_siswa }}</td>
                                                                <td>{{ $d->tahun_lulus }}</td>
                                                                <td>{{ $d->status }}</td>
                                                                <td>{{ $d->tempat_kerja_kuliah }}</td>
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
        @endif
        @if($status === "Wirausaha")
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <h4>List Siswa {{ $status}}</h4>
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <form action="{{ route('guru') }}" method="GET">
                                    <div class="row mt-3">
                                    </div>
                                </form>
                                <div class="card mt-3 table-responsive" style="min-height: 43rem">
                                    <div class="card-body">
                                        <div class="">
                                            @if ($data->isEmpty())
                                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                    <div><i class="bi bi-exclamation-circle me-3"></i>Data Berwirausaha Kosong</div>
                                                </div>
                                                <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center"
                                                    style="height: 80vh" data-aos="fade-up">
                                                    <img class="data-kosong" src="{{ asset('img/data_kosong_guru.png') }}"
                                                        alt="">
                                                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Siswa Berwirausaha</p>
                                                </div>
                                            @endif
                                            @if (!$data->isEmpty())
                                                <div class="d-flex mb-3">
                                                    <a href="{{ route('detail.wirausaha.download') }}" class=" ms-auto btn btn-success"><i class="bi bi-file-earmark-arrow-down me-3"></i>Download</a>
                                                </div>
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Jurusan</th>
                                                            <th>Urutan Kelas</th>
                                                            <th>Status Siswa</th>
                                                            <th>Tahun Lulus</th>
                                                            <th>Status Karir</th>
                                                            <th>Nama Wirausaha</th>
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->kelas }}</td>
                                                                <td>{{ $d->jurusan }}</td>
                                                                <td>{{ $d->urutan_kelas }}</td>
                                                                <td>{{ $d->status_siswa }}</td>
                                                                <td>{{ $d->tahun_lulus }}</td>
                                                                <td>{{ $d->status }}</td>
                                                                <td>{{ $d->tempat_kerja_kuliah }}</td>
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
        @endif
    </div>
@endsection
