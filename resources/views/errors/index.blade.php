@extends('errors.error_view')
@section('title', 'Tidak Ada Akses!')
@section('content')
    <img src="{{ asset('img/no-akses.png') }}" alt="" class="notfound1 mt-5">
    <h5 class="fw-semibold text-center mt-4" style="font-size:25px;color: rgb(55, 71, 79)">{{ __('Errors') }}</h5>
    {{-- <h5 class="fw-bold text-uppercase text-center mb-4"  style="font-size: 20px;color: #5276DA" class="navbar-text">{{ $exception }}</h5> --}}
    <h5 class="fw-medium text-center mt-2" style="color: #5276DA">Anda tidak memiliki akses! 
        <a href="{{ route('dashboard') }}" class="fw-medium text-center"
            style="color: #5276DA" class="navbar-text">kembali</a></h5>
@endsection
