@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if ($statusakhir === 'Terverifikasi')
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="h4">Data Nilai Siswa Semester 1</h4>
                        <div class="alert alert-success">
                            <p class="text-success m-0"><i class="fa-regular fa-circle-check me-2"></i>Data Terverifikasi Guru
                            </p>
                        </div>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            @foreach ($nilaiS1 as $nilai)
                                <div class="col-12 col-sm-6 col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-3">Nilai {{ $nilai->nama_mata_pelajaran }}</label>
                                        <input type="text" readonly class="form-control" value="{{ $nilai->nilai }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @elseif($statusakhir === 'Tidak Terverifikasi')
            {{-- jika status ditolak --}}
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="h4">Data Nilai Siswa Semester 1</h4>
                        <div class="alert alert-danger">
                            <p class="text-danger m-0"><i class="fa-regular fa-circle-xmark me-2"></i>Data Gagal
                                Terverifikasi Guru</p>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <form action="{{ route('datanilai1.add') }}" method="POST">
                                    @csrf
                                    <div class="container-fluid mt-5">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Bahasa Indonesia</label>
                                                    <input required type="text" name="bindo"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'BI')->first()->nilai }}"
                                                        id="bindo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Matematika</label>
                                                    <input required type="text" name="mtk"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'MTK')->first()->nilai }}"
                                                        id="mtk" class="form-control" max="2">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Bahasa Inggris</label>
                                                    <input required type="text" name="bing"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'BING')->first()->nilai }}"
                                                        id="bing" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Pendidikan Agama</label>
                                                    <input required type="text" name="pai"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'PAI')->first()->nilai }}"
                                                        id="pai" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Sejarah</label>
                                                    <input required type="text" name="si"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'SI')->first()->nilai }}"
                                                        id="si" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Ilmu Pengetahuan Alam dan
                                                        Sosial</label>
                                                    <input required type="text" name="ipas"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'IPAS')->first()->nilai }}"
                                                        id="ipas" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Seni Budaya</label>
                                                    <input required type="text" name="sb"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'SB')->first()->nilai }}"
                                                        id="sb" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Pendidikan
                                                        Kewarganegaraan</label>
                                                    <input required type="text" name="pkn"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'PKN')->first()->nilai }}"
                                                        id="pkn" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Pendidikan Olahraga dan
                                                        Jasmani</label>
                                                    <input required type="text" name="pjok"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'PJOK')->first()->nilai }}"
                                                        id="pjok" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai Kejuruan</label>
                                                    <input required type="text" name="kejuruan"
                                                        value="{{ $nilaiS1->where('mata_pelajaran', 'PJOK')->first()->nilai }}"
                                                        id="kejuruan" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 mt-5">
                                            <div class="form-group">
                                                <a href="./" class="btn btn-secondary">Close</a>
                                                <button type="submit" class="button px-3 py-2 rounded ms-2">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($statusakhir === 'Pending')
            {{-- jika status sedang dicek guru --}}
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="h4">Data Nilai Siswa Semester 1</h4>
                        <div class="alert alert-secondary">
                            <p class="text-secondary m-0"><i class="fa-solid fa-clock-rotate-left me-2"></i>Data sedang
                                diverifikasi Guru</p>
                        </div>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            @foreach ($nilaiS1 as $nilai)
                                <div class="col-12 col-sm-6 col-md-4 mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-3">Nilai {{ $nilai->nama_mata_pelajaran }}</label>
                                        <input type="text" readonly class="form-control" value="{{ $nilai->nilai }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
