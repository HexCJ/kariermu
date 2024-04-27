@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  <div class="row">
    <div class="col-12 mt-4">
        <div class="d-flex">
          <h4>Verifikasi Nilai</h4>
        </div>
        <div class="container-fluid" data-aos="fade-up">
          @if ($data->isEmpty())
            <div class="alert alert-warning d-flex align-items-center mt-3" role="alert">
              <div><i class="bi bi-exclamation-circle me-3"></i>Request Verifikasi Nilai Kosong</div>
            </div>
            <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 80vh" data-aos="fade-up">
              <img class="data-kosong" src="{{ asset('img/nilai_found.png') }}" alt="">
              <p class="fw-semibold mt-5 mb-0">Tidak Ada Request Verifikasi Nilai</p>
            </div>
          @endif
          @if(!$data->isEmpty())
            <div class="row">
              @foreach ($data as $d)
                <div class="col-12 col-md-3 mt-5">
                  <div class="card">
                    <div class="card-body">
                      <label for="nama" class="fw-medium mb-3"><i class="fa-solid fa-id-card me-2"></i>NISN</label>
                      <p class="mb-4 text-secondary">{{ $d->nisn }}</p>
                      <label for="nama" class="fw-medium mb-3"><i class="fa-solid fa-user-tag me-2"></i>Nama Lengkap</label>
                      <p class="mb-4 text-secondary">{{ $d->name }}</p>
                      <label for="kelas" class="fw-medium mb-3"><i class="fa-solid fa-school me-2"></i>Kelas</label>
                      <p class="mb-4 text-secondary">{{ $d->kelas.' '.$d->jurusan  }}</p>
                      <label class="fw-medium mb-3"><i class="fa-solid fa-chalkboard me-2"></i>Mata Pelajaran</label>
                      <p class="mb-4 text-secondary">{{ $d->mata_pelajaran }}</p>
                      <label class="fw-medium mb-3"><i class="bi bi-clipboard2-data me-2"></i>Nilai</label>
                      <h2 class="fw-bold">{{ $d->nilai }}</h2>
                      <div class="d-flex justify-content-end gap-3">
                        <form action="{{ route('tolak.nilai', ['id' => $d->id]) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" value="Tidak Terverifikasi" name="status">
                          <button type="submit" class="btn btn-danger"><i class="fa-regular fa-circle-xmark"></i></button>
                        </form>
                        <form action="{{ route('terima.nilai', ['id' => $d->id]) }}" method="post">
                          @csrf
                          @method('PUT')
                          <input type="hidden" value="Terverifikasi" name="status">
                          <button type="submit" class="btn btn-success"><i class="fa-regular fa-circle-check"></i></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
    </div>
  </div>
</div>
@endsection
