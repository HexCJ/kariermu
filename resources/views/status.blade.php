@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('partials.notification')
        @if($status === "Menganggur")
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <h4>List Siswa {{ $status }}</h4>
                        {{-- <a href="/guru/tambah" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Guru</a> --}}
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <form action="{{ route('guru') }}" method="GET">
                                    <div class="row mt-3">
                                        {{-- <div class="col-6 col-md-5">
                                            <div class="input-group mb-3 mt-3">
                                                <select name="mata_pelajaran" id="mata_pelajaran" class="rounded form-select">
                                                    <option value="" multiple aria-label="Multiple select example">Semua
                                                        Jurusan </option>
                                                    @foreach ($jurusans as $jurusan)
                                                        <option value="{{ $jurusan->id_jurusan }}"
                                                            {{ request()->input('jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>
                                                            {{ $jurusan->nama_jurusan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                </form>
                                <div class="card mt-3 table-responsive" style="min-height: 43rem">
                                    <div class="card-body">
                                        <div class="">
                                            @if ($data->isEmpty())
                                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                                    <div><i class="bi bi-exclamation-circle me-3"></i>Data Siswa {{ $status }} Kosong</div>
                                                </div>
                                                <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center"
                                                    style="height: 80vh" data-aos="fade-up">
                                                    <img class="data-kosong" src="{{ asset('img/data_kosong_guru.png') }}"
                                                        alt="">
                                                    <p class="fw-semibold mt-5 mb-0">Tidak Ada Data Siswa Menganggur</p>
                                                </div>
                                            @endif
                                            @if (!$data->isEmpty())
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Jurusan</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->jurusan }}</td>
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
                        {{-- <a href="/guru/tambah" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Guru</a> --}}
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <form action="{{ route('guru') }}" method="GET">
                                    <div class="row mt-3">
                                        {{-- <div class="col-6 col-md-5">
                                            <div class="input-group mb-3 mt-3">
                                                <select name="mata_pelajaran" id="mata_pelajaran" class="rounded form-select">
                                                    <option value="" multiple aria-label="Multiple select example">Semua
                                                        Jurusan </option>
                                                    @foreach ($jurusans as $jurusan)
                                                        <option value="{{ $jurusan->id_jurusan }}"
                                                            {{ request()->input('jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>
                                                            {{ $jurusan->nama_jurusan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                </form>
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
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Jurusan</th>
                                                            <th>Status</th>
                                                            <th>Tempat Bekerja</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->jurusan }}</td>
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
                        {{-- <a href="/guru/tambah" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Guru</a> --}}
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <form action="{{ route('guru') }}" method="GET">
                                    <div class="row mt-3">
                                        {{-- <div class="col-6 col-md-5">
                                            <div class="input-group mb-3 mt-3">
                                                <select name="mata_pelajaran" id="mata_pelajaran" class="rounded form-select">
                                                    <option value="" multiple aria-label="Multiple select example">Semua
                                                        Jurusan </option>
                                                    @foreach ($jurusans as $jurusan)
                                                        <option value="{{ $jurusan->id_jurusan }}"
                                                            {{ request()->input('jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>
                                                            {{ $jurusan->nama_jurusan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
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
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Jurusan</th>
                                                            <th>Status</th>
                                                            <th>Tempat Bekerja</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->jurusan }}</td>
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
                        {{-- <a href="/guru/tambah" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto"><i class="fa-solid fa-user-plus me-2"></i>Tambah Guru</a> --}}
                    </div>
                    <div class="container-fluid px-4" data-aos="fade-up">
                        <div class="row">
                            <div class="col p-0">
                                <form action="{{ route('guru') }}" method="GET">
                                    <div class="row mt-3">
                                        {{-- <div class="col-6 col-md-5">
                                            <div class="input-group mb-3 mt-3">
                                                <select name="mata_pelajaran" id="mata_pelajaran" class="rounded form-select">
                                                    <option value="" multiple aria-label="Multiple select example">Semua
                                                        Jurusan </option>
                                                    @foreach ($jurusans as $jurusan)
                                                        <option value="{{ $jurusan->id_jurusan }}"
                                                            {{ request()->input('jurusan') == $jurusan->id_jurusan ? 'selected' : '' }}>
                                                            {{ $jurusan->nama_jurusan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
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
                                                <table id="dataStatus" class="table table-hover w-100 mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>NISN</th>
                                                            <th>Nama</th>
                                                            <th>Jurusan</th>
                                                            <th>Status</th>
                                                            <th>Tempat Bekerja</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $d)
                                                            <tr>
                                                                <td>{{ $d->nisn }}</td>
                                                                <td>{{ $d->name }}</td>
                                                                <td>{{ $d->jurusan }}</td>
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
