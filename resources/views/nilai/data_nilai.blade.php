@extends('layouts.app')
@section('content')
    <div class="container-fluid min-vh-100">
        <div class="row">           
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-between">
                    <h4 class="h4">Data Nilai Siswa</h4>
                </div>
                @if($kelas->kelas === null)
                    <div class="d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 90vh" data-aos="fade-up">
                        <img class="data-kosong" src="{{ asset('img/data_kosong.png') }}" alt="">
                        <p class="fw-semibold mt-5 mb-0">Data Profile Anda Kosong</p>
                        <p class="fw-medium mt-3 mb-0"><a href="{{ route('profile') }}">Isi</a> Terlebih Dahulu</p>
                    </div>
                @elseif($kelas->kelas)
                    <div class="container-fluid" data-aos="fade-up">
                        <div class="row d-flex">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-5 mb-xl-0 ms-0 ms-lg-0 ms-xl-0 mt-5">
                                <div class="p-3 card">
                                    <h4 class="mt-3 ms-3 mb-3">Grafik Rata Rata Per Semester</h4>
                                    <canvas id="datanilai" class="h-100 w-100"></canvas>
                                </div>
                            </div>
                            <div
                                class="nilai col-12 col-sm-12 col-md-12 overflow-visible col-lg-4 col-xl-4 ms-sm-0 mt-0 mt-md-5">
                                <div class="p-3 card">
                                    <h4 class="mt-3 ms-3 mb-3">Nilai Rata-Rata</h4>
                                    <div class="container">
                                        <div class="row p-3">
                                            @if ($kelas->kelas === 'X')
                                                @php $jumlah_semester = 2; @endphp
                                            @elseif ($kelas->kelas === 'XI')
                                                @php $jumlah_semester = 4; @endphp
                                            @elseif ($kelas->kelas === 'XII')
                                                @php $jumlah_semester = 6; @endphp
                                            @endif

                                            @for ($i = 1; $i <= $jumlah_semester; $i++)
                                                {{-- Memeriksa apakah ada data untuk semester ini --}}
                                                @if ($data->where('semester_ke', $i)->isEmpty())
                                                    <div class="col-12 bg-tes mb-4 rounded p-3 text-light">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="d-flex justify-content-between">
                                                                <h5>Semester {{ $i }}</h5>
                                                                <p><i class="fa-solid fa-exclamation me-2"
                                                                        style="font-size: 1.3rem"></i></p>
                                                            </div>
                                                            <p id="nilaiData">Anda belum menginputkan nilai</p>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <a href="/nilai/add_nilai{{ $i }}"
                                                                class="text-decoration-none text-light rounded-circle cursor-pointer"
                                                                style="font-size: 1.3rem"><i class="bi bi-plus-circle"></i></a>
                                                        </div>
                                                    </div>
                                                @else
                                                    @foreach ($data->where('semester_ke', $i) as $nilai)
                                                        @php
                                                            $statuses = explode(',', $nilai->statuses);
                                                            if (in_array(null, $statuses)) {
                                                                $status = null;
                                                            } elseif (in_array('Tidak Terverifikasi', $statuses)) {
                                                                $status = 'Tidak Terverifikasi';
                                                            } elseif (in_array('Pending', $statuses)) {
                                                                $status = 'Pending';
                                                            } else {
                                                                $status = 'Terverifikasi';
                                                            }
                                                        @endphp
                                                        @if ($status === 'Pending')
                                                            <div class="col-12 bg-navy mb-4 rounded p-3 text-light">
                                                                <div class="d-flex flex-column gap-2">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5>Semester {{ $nilai->semester_ke }}</h5>
                                                                        <p><i class="fa-solid fa-clock-rotate-left"
                                                                                style="font-size: 1.3rem"></i></p>
                                                                    </div>
                                                                    <p id="nilaiData">
                                                                        Nilai sedang diverifikasi..
                                                                    </p>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <a href="/nilai/detail_nilai{{ $nilai->semester_ke }}"
                                                                        class="text-decoration-none text-light rounded-circle cursor-pointer">Detail
                                                                        nilai..</a>
                                                                </div>
                                                            </div>
                                                        @elseif ($status === 'Terverifikasi')
                                                            <div class="col-12 bg-success mb-4 rounded p-3 text-light">
                                                                <div class="d-flex flex-column gap-2">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5>Semester {{ $nilai->semester_ke }}</h5>
                                                                        <p><i class="fa-regular fa-circle-check"
                                                                                style="font-size: 1.3rem"></i>
                                                                        </p>
                                                                    </div>
                                                                    <p id="nilaiData">
                                                                        {{ $rata_rata_semester[$nilai->semester] }}
                                                                    </p>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <a href="/nilai/detail_nilai{{ $nilai->semester_ke }}"
                                                                        class="text-decoration-none text-light cursor">detail
                                                                        nilai..</a>
                                                                </div>
                                                            </div>
                                                        @elseif ($status === 'Tidak Terverifikasi')
                                                            <div class="col-12 bg-danger mb-4 rounded p-3 text-light">
                                                                <div class="d-flex flex-column gap-2">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5>Semester {{ $nilai->semester_ke }}</h5>
                                                                        <p><i class="fa-regular fa-circle-xmark"
                                                                                style="font-size: 1.3rem"></i></p>
                                                                    </div>
                                                                    <p id="nilaiData">Nilai tidak terverifikasi</p>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <a href="/nilai/detail_nilai{{ $nilai->semester_ke }}"
                                                                        class="text-decoration-none text-light">perbarui
                                                                        nilai..</a>
                                                                </div>
                                                            </div>
                                                        @elseif ($status === null)
                                                            <div class="col-12 bg-tes rounded mb-4 p-3 text-light">
                                                                <div class="d-flex flex-column gap-2">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h5>Semester {{ $nilai->semester_ke }}</h5>
                                                                        <p><i class="fa-solid fa-exclamation me-2"
                                                                                style="font-size: 1.3rem"></i></p>
                                                                    </div>
                                                                    <p id="nilaiData">Anda belum menginputkan nilai</p>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <a href="/nilai/add_nilai{{ $nilai->semester_ke }}"
                                                                        class="text-decoration-none text-light rounded-circle cursor-pointer"
                                                                        style="font-size: 1.3rem"><i
                                                                            class="bi bi-plus-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        // chart nilai
        // <block:segmentUtils:1>
        const skipped = (dataNilai, value) => dataNilai.p0.skip || dataNilai.p1.skip ? value : undefined;
        const down = (dataNilai, value) => dataNilai.p0.parsed.y > dataNilai.p1.parsed.y ? value : undefined;

        const genericOptions = {
            fill: false,
            interaction: {
                intersect: false
            },
            radius: 0,
        };

        // Menggunakan blade directive untuk memasukkan nilai rata-rata ke dalam JavaScript
        var rata1 = {{ $rata_rata_semester['S1'] ?? '0' }};
        var rata2 = {{ $rata_rata_semester['S2'] ?? '0' }};
        var rata3 = {{ $rata_rata_semester['S3'] ?? '0' }};
        var rata4 = {{ $rata_rata_semester['S4'] ?? '0' }};
        var rata5 = {{ $rata_rata_semester['S5'] ?? '0' }};
        var rata6 = {{ $rata_rata_semester['S6'] ?? '0' }};

        // Menggunakan nilai-nilai tersebut dalam variabel nilaiData
        const nilaiData = [rata1, rata2, rata3, rata4, rata5,rata6];

        const dataNilai = document.getElementById('datanilai');
        new Chart(dataNilai, {
            type: 'line',
            data: {
                labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5','Semester 6'],
                datasets: [{
                    label: 'Grafik Nilai Per Semester',
                    data: nilaiData,
                    borderColor: 'rgb(75, 192, 192)',
                    segment: {
                        borderColor: dataNilai => skipped(dataNilai, 'rgb(0,0,0,0.2)') || down(dataNilai,
                            'rgb(192,75,75)'),
                        borderDash: dataNilai => skipped(dataNilai, [6, 6]),
                    },
                    spanGaps: true
                }]
            },
            options: {
                scale: {
                    y: {
                        suggestedMax: 100,
                        suggestedMin: 0,
                    }
                }
            }

        });
        // </block:config>

        module.exports = {
            actions: [],
            config: config,
        };
    </script>
@endsection
