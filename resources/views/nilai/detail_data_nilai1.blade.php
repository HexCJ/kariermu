@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @if ($statusakhir === 'Terverifikasi')
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-between">
                        <h4 class="h4">Data Nilai Siswa Semester 1</h4>
                        <div class="alert alert-success">   
                            <p class="text-success m-0"><i class="fa-regular fa-circle-check me-2"></i>Data Nilai Terverifikasi oleh {{ $nama_guru->name }}</p>
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
                            <p class="text-danger m-0"><i class="fa-regular fa-circle-xmark me-2"></i>Verifikasi Data Nilai digagalkan oleh {{ $nama_guru->name }}</p>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <form action="{{ route('datanilai1.add') }}" method="POST">
                                    @csrf
                                    <div class="container-fluid mt-5">
                                        <div class="row">
                                        @foreach ($nilaiS1 as $nilai)
                                            <div class="col-12 col-sm-6 col-md-4 mb-3">
                                                <div class="form-group">
                                                    <label for="" class="mb-3">Nilai {{ $nilai->nama_mata_pelajaran }}</label>
                                                    <input type="text" class="form-control" name="{{ $nilai->mata_pelajaran }}" value="{{ $nilai->nilai }}">
                                                </div>
                                                @error($nilai->mata_pelajaran)
                                                <small class="text-danger mt-3">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        @endforeach
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
                            <p class="text-secondary m-0"><i class="fa-solid fa-clock-rotate-left me-2"></i>Data Nilai Sedang
                                Diverifikasi</p>
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
    </div>
@endsection
