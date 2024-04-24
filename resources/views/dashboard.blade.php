@extends('layouts.app')
@section('content')
@if(auth()->user()->HasRole('admin') || auth()->user()->HasRole('guru'))
<div class="container-fluid" data-aos="fade-up">
  {{-- admin /guru --}}
  <div class="row px-5">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between" data-aos="fade-up">
        <h4 class="h4">Welcome To Admin Dashboard SMKN 4 Tangerang</h4>
      </div>
      <div class="row mt-5 d-flex justify-content-center px-0 px-lg-3 px-xl-0 px-xl-1">
        {{-- data status karir tidak bekerja --}}
        <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-users-line icon"></i>
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-2 ms-sm-2 ms-md-4">
            <p class="title-data fw-medium text-secondary">Pengangguran</p>
            <h1 class="detail-data fw-bold text-primary-emphasis">50</h1>
            <a href="{{ route('detail.status') }}" class="detail text-secondary">detail siswa menganggur..</a>
          </div>
        </div>
        {{-- Data status karir bekerja --}}
        <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <i class="icon fa-solid fa-briefcase"></i>
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-2 ms-sm-2 ms-md-4">
            <p class="title-data fw-medium text-secondary">Bekerja</p>
            <h1 class="detail-data fw-bold text-primary-emphasis">1.600</h1>
            <a href="{{ route('detail.status') }}" class="detail text-secondary">detail siswa bekerja..</a>
          </div>
        </div>
        {{-- data status karir kuliah --}}
        <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <i class="icon fa-solid fa-graduation-cap a-icon"></i>
            {{-- <i class="fa-solid fa-user-graduate a-icon icon"></i> --}}
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-2 ms-sm-2 ms-md-4">
            <p class="title-data fw-medium text-secondary">Kuliah</p>
            <h1 class="detail-data fw-bold text-primary-emphasis">500</h1>
            <a href="{{ route('detail.status') }}" class="detail text-secondary">detail siswa berkuliah..</a>
          </div>
        </div>
        {{-- data status karir wirausaha --}}
        <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3" data-aos="fade-up">
          <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-shop a-icon icon"></i>
          </div>
          <div class="d-flex flex-column gap-1 gap-sm-2 ms-2 ms-sm-2 ms-md-4">
            <p class="title-data fw-medium text-secondary">Wirausaha</p>
            <h1 class="detail-data fw-bold text-primary-emphasis">600</h1>
            <a href="{{ route('detail.status') }}" class="detail text-secondary">detail siswa berwirausaha..</a>
          </div>
        </div>
      </div>
      <div class="row mt-5 px-0 px-lg-3 px-xl-1">
        {{-- chart grafik data karir --}}
         <div class="col-12 col-md-6 card p-3">
           <h4 class="mb-5 mt-2">Presentase Data Karir</h4>
           <div>
             <div>
               <canvas id="myChart"></canvas>
             </div>
           </div>
         </div>
         <div class="col-6">
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@if(auth()->user()->HasRole('siswa'))
<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 90vh" data-aos="fade-up">
  {{-- user --}}
  <div class="row px-5">
    <div class="col-12 mt-4">
      {{-- <div class="d-flex justify-content-between" data-aos="fade-up">
        <h4 class="h4">Welcome Siswa To Dashboard SMKN 4 Tangerang</h4>
      </div> --}}
      <div class="row mt-5 px-0 px-lg-3 px-xl-1">
         <div class="col-12 col-md-6 text-center">
          <img src="{{ asset('img/dashboard.png') }}" alt="" class="w-50">
         </div>
         <div class="col-12 col-md-6 ps-0 px-md-5 d-flex flex-column justify-content-center gap-3 mt-5 mt-md-0">
          <h2 class="fw-bold text-primary-emphasis">Halo, {{ $siswa->name }} Selamat Datang Di Kariermu.</h2>
          <h4 class="fw-medium text-primary-emphasis">Laporkan Status Kariermu Di Sini</h4>
          <div class="row">
            {{-- <div class="col-4">
              <div class="alert alert-danger">
                <p class="p-0 m-0"><i class="bi bi-exclamation-circle-fill me-3"></i>Segera Menginput Data Profile</p>
              </div>
            </div> --}}
            <div class="col-12 col-md-6">
              <a href="{{ route('karir') }}" class="btn btn-primary w-50">Laporkan.</a>
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
@endif
@endsection