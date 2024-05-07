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
                                        <div class="card-body alert alert-primary">
                                            @if($d->image)
                                            <div class="d-flex justify-content-center align-items-cebter mb-5 mt-3">
                                                <img src="{{ asset('storage/photo-user/'.$d->image) }}" alt="" class="profile-foto">
                                            </div>
                                            @elseif($d->jenis_kelamin === 'Laki-laki')
                                            <div class="d-flex justify-content-center align-items-cebter mb-5 mt-3">
                                                <img src="{{ asset('img/sma_profile1.png') }}" alt="" class="profile-foto">
                                            </div>
                                            @elseif($d->jenis_kelamin === 'Perempuan')
                                                <div class="d-flex justify-content-center align-items-cebter mb-5 mt-3">
                                                    <img src="{{ asset('img/sma_profile2.png') }}" alt="" class="profile-foto">
                                                </div>
                                            @endif
                                            <div class="d-flex">
                                                <div class="d-flex flex-column">
                                                    <label for="nama" class="fw-medium mb-3"><i
                                                            class="fa-solid fa-id-card me-2"></i>NISN</label>
                                                    <p class="mb-4">{{ $d->nisn }}</p>
                                                </div>
                                                <div class="d-flex flex-column ms-auto">
                                                    <p class="ms-auto" style="font-size: 12px">menunggu..<i
                                                            class="fa-solid fa-clock-rotate-left ms-2"
                                                            style="font-size: 1rem"></i>
                                                    </p>
                                                    <p class="ms-auto" style="font-size: 12px">{{ $d->last_created_at }}</p>
                                                </div>
                                            </div>
                                            <label for="nama" class="fw-medium mb-3"><i
                                                    class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                                            <p class="mb-4">{{ $d->name }}</p>
                                            <label for="kelas" class="fw-medium mb-3"><i
                                                    class="fa-solid fa-school me-2"></i>Kelas</label>
                                            <p class="mb-4">{{ $d->kelas }} {{ $d->jurusan }} {{ $d->urutan_kelas }}</p>
                                            <!-- Button trigger modal -->
                                            <div class="d-flex">
                                                <a href="{{ route('verifikasi.nilai', ['nisn' => $d->nisn]) }}"
                                                    class="alert-link ms-auto">Detail nilai..</a>
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
