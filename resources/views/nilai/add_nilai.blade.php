@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between">
        <h4 class="h4">Data Nilai Siswa Semester 1</h4>
      </div>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Indonesia</label>
              <input type="text" name="bindo" id="bindo" class="form-control">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Matematika</label>
              <input type="text" name="mtk" id="mtk" class="form-control" max="2">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Inggris</label>
              <input type="text" name="bingg" id="bingg" class="form-control">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Pendidikan Agama</label>
              <input type="text" name="bingg" id="agama" class="form-control">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Sejarah</label>
              <input type="text" name="si" id="si" class="form-control">
            </div>
          </div>
        </div>
          <div class="col-12 mb-3">
            <div class="form-group">
              <a href="" class="btn btn-secondary">Close</a>
              <button type="submit" class="button">Submit</button>
            </div>
          </div>
        </div>
        <div class="row d-none">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
            <div><i class="bi bi-exclamation-circle me-3"></i>Data Nilai Sudah Terisi</div>
          </div>
          <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center" style="height: 80vh" data-aos="fade-up">
            <img src="{{ asset('img/nilai_found.png') }}" alt="" style="width: 100px">
            <p class="fw-semibold mt-5 mb-0">Data Nilai Sudah Terisi</p>
            <p class="fw-medium mt-2 mb-0">Pergi Ke Detail Nilai Untuk Melihatnya</p>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection