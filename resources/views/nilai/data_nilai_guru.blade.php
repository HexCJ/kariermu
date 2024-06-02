@extends('layouts.app')
@section('content')
@section('alert-kosong')
    <div class="alert alert-success d-flex align-items-center mt-3" role="alert">
        <div><i class="bi bi-card-checklist me-3"></i>Tidak ada nilai yang perlu diverifikasi.
        </div>
    </div>
    <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 80vh" data-aos="fade-up">
        <img class="data-kosong" src="{{ asset('img/nilai_found.png') }}" alt="">
        <p class="fw-semibold mt-5 mb-0">Tidak ada permohonan verifikasi.</p>
    </div>
@endsection
<div class="container-fluid">
@include('partials.notification')
    <div class="row">
        <div class="col-12 mt-4">
            <div class="d-flex">
                <h4>Verifikasi Nilai</h4>
            </div>
            @if($data_profile->mata_pelajaran == null || $data_profile->walikelas == null)
                <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 90vh" data-aos="fade-up">
                    <img class="data-kosong" src="{{ asset('img/data_kosong.png') }}" alt="">
                    <p class="fw-semibold mt-5 mb-0">Data Profile Anda Kosong</p>
                    <p class="fw-medium mt-3 mb-0"><a href="{{ route('profile') }}">Isi</a> Terlebih Dahulu</p>
                </div>
            @else
                <div class="container-fluid" data-aos="fade-up">
                    <div class="row">
                        @if ($data->isEmpty())
                            @yield('alert-kosong')
                            @elseif(!$data->isEmpty())
                                @foreach ($data as $d)
                                    <div class="col-12 col-xl-3 col-md-6 mt-4">
                                        <div class="shadow-sm p-3 mb-5 rounded">
                                            <div class="card-body">
                                                @if($d->image)
                                                <div class="d-flex justify-content-center align-items-cebter mb-5 mt-3">
                                                    <img src="{{ asset('storage/photo-user/'.$d->image) }}" alt="" class="profile-foto1">
                                                </div>
                                                @elseif($d->jenis_kelamin === 'Laki-laki')
                                                <div class="d-flex justify-content-center align-items-cebter mb-5 mt-3">
                                                    <img src="{{ asset('img/sma_profile1.png') }}" alt="" class="profile-foto1">
                                                </div>
                                                @elseif($d->jenis_kelamin === 'Perempuan')
                                                    <div class="d-flex justify-content-center align-items-cebter mb-5 mt-3">
                                                        <img src="{{ asset('img/sma_profile2.png') }}" alt="" class="profile-foto1">
                                                    </div>
                                                @endif
                                                <div class="d-flex justify-content-center align-items-center flex-column">
                                                    <p class="fw-bold">{{ $d->name }}</p>
                                                    {{-- <p class="mb-4 fw-semibold text-muted">{{ $d->kelas }} {{ $d->jurusan }} {{ $d->urutan_kelas }}</p> --}}
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                                                        <i class="fa-solid fa-id-card rounded-circle alert alert-primary"></i>
                                                        <p class="mb-3 fw-semibold text-muted">{{ $d->nisn }}</p>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                                                        <i class="fa-solid fa-school-flag rounded-circle alert alert-purple"></i>
                                                        <p class="mb-3 fw-semibold text-muted">{{ $d->kelas }} {{ $d->jurusan }} {{ $d->urutan_kelas }}</</p>
                                                    </div>
                                                </div>
                                                <!-- Button trigger modal -->
                                                <div class="d-flex mt-3 border-top">
                                                    <a href="{{ route('verifikasi.nilai', ['nisn' => $d->nisn]) }}"
                                                        class="ms-auto mt-3 fw-bold text-decoration-none text-primary-emphasis m-auto">Detail nilai..</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>
@endsection
