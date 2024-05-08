@extends('dashboard')
@section('dashboard-siswa')
  <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 90vh" data-aos="fade-up">
    {{-- user --}}
    <div class="row px-4 px-md-5">
      <div class="col-12 mt-4">
        <div class="row mt-5 px-0 px-lg-3 px-xl-1">
          <div class="col-12 col-md-6 text-center">
            <img src="{{ asset('img/dashboard.png') }}" alt="" class="w-50">
          </div>
          <div class="col-12 col-md-6 ps-0 d-flex flex-column justify-content-center mt-5 mt-md-0">
            <h2 class="fw-bold text-primary-emphasis">Halo, {{ $siswa->name }} 👋</h2>
            <h4 class="fw-bold text-primary-emphasis"> Selamat Datang Di Kariermu.</h4>
            <h5 class="fw-medium text-primary-emphasis mt-3">Laporkan Status Kariermu Di Sini</h5>
            <div class="row mt-2">
              <div class="col-12 col-md-6">
                <a href="{{ route('karir') }}" class="btn btn-primary">Laporkan.</a>
              </div>
              {{-- <div class="col-6">
                <div class="alert alert-danger">
                  <p class="p-0 m-0"><i class="bi bi-exclamation-circle-fill me-3"></i>Segera Menginput Data <a class="alert-link" href="{{ route('profile') }}">Profile</a></p>
                </div>
              </div> --}}
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection