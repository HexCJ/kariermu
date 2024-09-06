@extends('layouts.data_nilai_layout')
@section('content')
    <div class="container-fluid">
        @include('partials.notification')
        <div class="row">
            <div class="col-12 mt-4">
                <div class="d-flex">
                    <h4>Verifikasi Nilai</h4>
                </div>
            @section('alert-kosong')
            <div class="col-12">
                <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
                    <div><i class="bi bi-card-checklist me-3"></i>Tidak ada nilai yang perlu diverifikasi di semester ini.
                    </div>
                </div>
                <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center"
                    style="height: 80vh" data-aos="fade-up">
                    <img class="data-kosong" src="{{ asset('img/nilai_found.png') }}">
                    <p class="fw-semibold mt-5 mb-0">Tidak ada permohonan verifikasi di semester ini.</p>
                </div>
            </div>
            @endsection
            <div class="container-fluid-fluid mt-4">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-s1=tab" data-bs-toggle="pill"
                            data-bs-target="#pills-s1" type="button" role="tab" aria-controls="pills-s1"
                            aria-selected="true">Semester 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-s2"
                            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Semester
                            2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-s3"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Semester
                            3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-s4"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Semester
                            4</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-s5"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Semester
                            5</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-s6"
                            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Semester
                            6</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-s1" role="tabpanel" aria-labelledby="pills-s1-tab"
                        tabindex="0">
                        <div class="container-fluid" data-aos="fade-up">
                            <div class="row">
                                @if ($semester1->isEmpty())
                                    @yield('alert-kosong')
                                @elseif(!$semester1->isEmpty())
                                @php
                                    $semester = 'S1';
                                @endphp
                                <div class="d-flex justify-content-end gap-3 mb-2">
                                    <div class="tolak-semua">
                                        <form action="{{ route('tolak.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" id="tolak-semua-nilai-button-s1" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="Tidak Terverifikasi"
                                                name="status">
                                            <button type="button" class="btn btn-danger" id="tolak-semua-nilai-button-s1">Tolak semua nilai<i
                                                    class="ms-2 fa-regular fa-circle-xmark"></i></button>
                                            <script>
                                                document.getElementById('tolak-semua-nilai-button-s1').addEventListener('click', function() {
                                                    Swal.fire({
                                                        title: 'Apakah Anda yakin?',
                                                        text: "Anda tidak dapat mengembalikan status perubahan nilai ini!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        confirmButtonText: 'Ya, tolak!',
                                                        cancelButtonColor: '#d33',
                                                        cancelButtonText: 'Batal'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('tolak-semua-nilai-button-s1').submit();
                                                        }
                                                    });
                                                });
                                            </script>        
                                        </form>
                                    </div>
                                    <div class="terima-semua">
                                        <form action="{{ route('terima.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Terverifikasi" name="status">
                                        <button type="submit" class="btn btn-success">Terima semua nilai<i
                                                class="ms-2 fa-regular fa-circle-check"></i></button>
                                        </form>
                                    </div>
                                </div>
                                    @foreach ($semester1 as $d)
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="fw-medium mb-3"><i
                                                            class="fa-solid fa-chalkboard me-2"></i>Mata
                                                        Pelajaran</label>
                                                    <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                                                    <label class="fw-medium mb-3"><i
                                                            class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                                                    <h2 class="fw-bold">{{ $d->nilai }}</h2>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form
                                                            action="{{ route('tolak.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Tidak Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </form>
                                                        <form
                                                            action="{{ route('terima.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Terverifikasi" name="status">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa-regular fa-circle-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-s2" role="tabpanel" aria-labelledby="pills-s2-tab"
                        tabindex="0">
                        <div class="container-fluid" data-aos="fade-up">
                            <div class="row">
                                @if ($semester2->isEmpty())
                                    @yield('alert-kosong')
                                @elseif(!$semester2->isEmpty())
                                    @php
                                    $semester = 'S2';
                                    @endphp
                                    <div class="d-flex justify-content-end gap-3 mb-2">
                                        <div class="tolak-semua">
                                            <form action="{{ route('tolak.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" id="tolak-semua-nilai-button-s2" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="Tidak Terverifikasi"
                                                    name="status">
                                                <button type="button" class="btn btn-danger" id="tolak-semua-nilai-button-s2">Tolak semua nilai<i class="ms-2 fa-regular fa-circle-xmark"></i></button>
                                                <script>
                                                    document.getElementById('tolak-semua-nilai-button-s2').addEventListener('click', function() {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin?',
                                                            text: "Anda tidak dapat mengembalikan status perubahan nilai ini!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Ya, tolak!',
                                                            cancelButtonColor: '#d33',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('tolak-semua-nilai-button-s2').submit();
                                                            }
                                                        });
                                                    });
                                                </script>        
                                            </form>
                                        </div>
                                        <div class="terima-semua">
                                            <form action="{{ route('terima.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="Terverifikasi" name="status">
                                            <button type="submit" class="btn btn-success">Terima semua nilai<i
                                                    class="ms-2 fa-regular fa-circle-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach ($semester2 as $d)
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="fw-medium mb-3"><i
                                                            class="fa-solid fa-chalkboard me-2"></i>Mata
                                                        Pelajaran</label>
                                                    <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                                                    <label class="fw-medium mb-3"><i
                                                            class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                                                    <h2 class="fw-bold">{{ $d->nilai }}</h2>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form
                                                            action="{{ route('tolak.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Tidak Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </form>
                                                        <form
                                                            action="{{ route('terima.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa-regular fa-circle-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-s3" role="tabpanel" aria-labelledby="pills-s3-tab"
                        tabindex="0">
                        <div class="container-fluid" data-aos="fade-up">
                            <div class="row">
                                @if ($semester3->isEmpty())
                                    @yield('alert-kosong')
                                @elseif(!$semester3->isEmpty())
                                    @php
                                    $semester = 'S3';
                                    @endphp
                                    <div class="d-flex justify-content-end gap-3 mb-2">
                                        <div class="tolak-semua">
                                            <form action="{{ route('tolak.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" id="tolak-semua-nilai-button-s3" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="Tidak Terverifikasi"
                                                    name="status">
                                                <button type="button" class="btn btn-danger" id="tolak-semua-nilai-button-s3">Tolak semua nilai<i class="ms-2 fa-regular fa-circle-xmark"></i></button>
                                                <script>
                                                    document.getElementById('tolak-semua-nilai-button-s3').addEventListener('click', function() {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin?',
                                                            text: "Anda tidak dapat mengembalikan status perubahan nilai ini!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Ya, tolak!',
                                                            cancelButtonColor: '#d33',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('tolak-semua-nilai-button-s3').submit();
                                                            }
                                                        });
                                                    });
                                                </script>        
                                            </form>
                                        </div>
                                        <div class="terima-semua">
                                            <form action="{{ route('terima.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="Terverifikasi" name="status">
                                            <button type="submit" class="btn btn-success">Terima semua nilai<i
                                                    class="ms-2 fa-regular fa-circle-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach ($semester3 as $d)
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="fw-medium mb-3"><i
                                                            class="fa-solid fa-chalkboard me-2"></i>Mata
                                                        Pelajaran</label>
                                                    <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                                                    <label class="fw-medium mb-3"><i
                                                            class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                                                    <h2 class="fw-bold">{{ $d->nilai }}</h2>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form
                                                            action="{{ route('tolak.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Tidak Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </form>
                                                        <form
                                                            action="{{ route('terima.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa-regular fa-circle-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-s4" role="tabpanel" aria-labelledby="pills-s4-tab"
                        tabindex="0">
                        <div class="container-fluid" data-aos="fade-up">
                            <div class="row">
                                @if ($semester4->isEmpty())
                                    @yield('alert-kosong')
                                @elseif(!$semester4->isEmpty())
                                    @php
                                    $semester = 'S4';
                                    @endphp
                                    <div class="d-flex justify-content-end gap-3 mb-2">
                                        <div class="tolak-semua">
                                            <form action="{{ route('tolak.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" id="tolak-semua-nilai-button-s4" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="Tidak Terverifikasi"
                                                    name="status">
                                                <button type="button" class="btn btn-danger" id="tolak-semua-nilai-button-s4">Tolak semua nilai<i class="ms-2 fa-regular fa-circle-xmark"></i></button>
                                                <script>
                                                    document.getElementById('tolak-semua-nilai-button-s4').addEventListener('click', function() {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin?',
                                                            text: "Anda tidak dapat mengembalikan status perubahan nilai ini!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Ya, tolak!',
                                                            cancelButtonColor: '#d33',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('tolak-semua-nilai-button-s4').submit();
                                                            }
                                                        });
                                                    });
                                                </script>        
                                            </form>
                                        </div>
                                        <div class="terima-semua">
                                            <form action="{{ route('terima.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="Terverifikasi" name="status">
                                            <button type="submit" class="btn btn-success">Terima semua nilai<i
                                                    class="ms-2 fa-regular fa-circle-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach ($semester4 as $d)
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="fw-medium mb-3"><i
                                                            class="fa-solid fa-chalkboard me-2"></i>Mata
                                                        Pelajaran</label>
                                                    <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                                                    <label class="fw-medium mb-3"><i
                                                            class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                                                    <h2 class="fw-bold">{{ $d->nilai }}</h2>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form
                                                            action="{{ route('tolak.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Tidak Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </form>
                                                        <form
                                                            action="{{ route('terima.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa-regular fa-circle-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-s5" role="tabpanel" aria-labelledby="pills-s5-tab"
                        tabindex="0">
                        <div class="container-fluid" data-aos="fade-up">
                            <div class="row">
                                @if ($semester5->isEmpty())
                                    @yield('alert-kosong')
                                @elseif(!$semester5->isEmpty())
                                    @php
                                    $semester = 'S5';
                                    @endphp
                                    <div class="d-flex justify-content-end gap-3 mb-2">
                                        <div class="tolak-semua">
                                            <form action="{{ route('tolak.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" id="tolak-semua-nilai-button-s5" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="Tidak Terverifikasi"
                                                    name="status">
                                                <button type="button" class="btn btn-danger" id="tolak-semua-nilai-button-s5">Tolak semua nilai<i class="ms-2 fa-regular fa-circle-xmark"></i></button>
                                                <script>
                                                    document.getElementById('tolak-semua-nilai-button-s5').addEventListener('click', function() {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin?',
                                                            text: "Anda tidak dapat mengembalikan status perubahan nilai ini!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Ya, tolak!',
                                                            cancelButtonColor: '#d33',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('tolak-semua-nilai-button-s5').submit();
                                                            }
                                                        });
                                                    });
                                                </script>        
                                            </form>
                                        </div>
                                        <div class="terima-semua">
                                            <form action="{{ route('terima.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="Terverifikasi" name="status">
                                            <button type="submit" class="btn btn-success">Terima semua nilai<i
                                                    class="ms-2 fa-regular fa-circle-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach ($semester5 as $d)
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="fw-medium mb-3"><i
                                                            class="fa-solid fa-chalkboard me-2"></i>Mata
                                                        Pelajaran</label>
                                                    <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                                                    <label class="fw-medium mb-3"><i
                                                            class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                                                    <h2 class="fw-bold">{{ $d->nilai }}</h2>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form
                                                            action="{{ route('tolak.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Tidak Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </form>
                                                        <form
                                                            action="{{ route('terima.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa-regular fa-circle-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-s6" role="tabpanel" aria-labelledby="pills-s6-tab"
                        tabindex="0">
                        <div class="container-fluid" data-aos="fade-up">
                            <div class="row">
                                @if ($semester6->isEmpty())
                                    @yield('alert-kosong')
                                @elseif(!$semester6->isEmpty())
                                    @php
                                    $semester = 'S6';
                                    @endphp
                                    <div class="d-flex justify-content-end gap-3 mb-2">
                                        <div class="tolak-semua">
                                            <form action="{{ route('tolak.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" id="tolak-semua-nilai-button-s6" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" value="Tidak Terverifikasi"
                                                    name="status">
                                                <button type="button" class="btn btn-danger" id="tolak-semua-nilai-button-s6">Tolak semua nilai<i class="ms-2 fa-regular fa-circle-xmark"></i></button>
                                                <script>
                                                    document.getElementById('tolak-semua-nilai-button-s6').addEventListener('click', function() {
                                                        Swal.fire({
                                                            title: 'Apakah Anda yakin?',
                                                            text: "Anda tidak dapat mengembalikan status perubahan nilai ini!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            confirmButtonText: 'Ya, tolak!',
                                                            cancelButtonColor: '#d33',
                                                            cancelButtonText: 'Batal'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('tolak-semua-nilai-button-s6').submit();
                                                            }
                                                        });
                                                    });
                                                </script>        
                                            </form>
                                        </div>
                                        <div class="terima-semua">
                                            <form action="{{ route('terima.nilai.semua', ['nisn' => $nisn_siswa, 'semester' => $semester]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="Terverifikasi" name="status">
                                            <button type="submit" class="btn btn-success">Terima semua nilai<i
                                                    class="ms-2 fa-regular fa-circle-check"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @foreach ($semester6 as $d)
                                        <div class="col-12 col-md-4 col-lg-3 mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label class="fw-medium mb-3"><i
                                                            class="fa-solid fa-chalkboard me-2"></i>Mata
                                                        Pelajaran</label>
                                                    <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                                                    <label class="fw-medium mb-3"><i
                                                            class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                                                    <h2 class="fw-bold">{{ $d->nilai }}</h2>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form
                                                            action="{{ route('tolak.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Tidak Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fa-regular fa-circle-xmark"></i></button>
                                                        </form>
                                                        <form
                                                            action="{{ route('terima.nilai', ['id' => $d->id, 'nisn' => $d->nisn]) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" value="Terverifikasi"
                                                                name="status">
                                                            <button type="submit" class="btn btn-success"><i
                                                                    class="fa-regular fa-circle-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
