@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between">
        <h4 class="h4">Data Nilai Siswa Semester $1</h4>
        <div class="alert alert-success">
          <p class="text-success m-0"><i class="fa-regular fa-circle-check me-2"></i>Data Terverifikasi Guru</p>
        </div>
      </div>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Indonesia</label>
              <input type="text" readonly name="" id="" class="form-control" value="85">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Matematika</label>
              <input type="text" readonly name="" id="" class="form-control" value="85">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Inggris</label>
              <input type="text" readonly name="" id="" class="form-control" value="80">
            </div>
          </div>
      </div>
    </div>
  </div>
</div>


{{-- jika status ditolak --}}
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between">
        <h4 class="h4">Data Nilai Siswa Semester $1</h4>
        <div class="alert alert-danger">
          <p class="text-danger m-0"><i class="fa-regular fa-circle-xmark me-2"></i>Data Gagal Terverifikasi Guru</p>
        </div>
      </div>
      <div class="container-fluid mt-5">
        <div class="row">
          <div id="alert-test"></div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Indonesia</label>
              <input type="text" readonly name="" id="" class="form-control" value="85">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Matematika</label>
              <input type="text" readonly name="" id="" class="form-control" value="85">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Inggris</label>
              <input type="text" readonly name="" id="" class="form-control" value="80">
            </div>
          </div>
          <div class="d-flex mt-3">
              <button type="button" class="btn btn-success me-3" id="submitUpdate" style="width: 10rem">submit</button>
              <button type="reset" class="btn btn-danger me-3" style="width: 10rem">reset</button>
          </div>
        </div>
    </div>
  </div>
</div>

{{-- jika status sedang dicek guru --}}
<div class="container-fluid">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between">
        <h4 class="h4">Data Nilai Siswa Semester $1</h4>
        <div class="alert alert-secondary">
          <p class="text-secondary m-0"><i class="fa-solid fa-clock-rotate-left me-2"></i>Data sedang diverifikasi Guru</p>
        </div>
      </div>
      <div class="container-fluid mt-5">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Indonesia</label>
              <input type="text" readonly name="" id="" class="form-control" value="85">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Matematika</label>
              <input type="text" readonly name="" id="" class="form-control" value="85">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mb-3">
            <div class="form-group">
              <label for="" class="mb-3">Nilai Bahasa Inggris</label>
              <input type="text" readonly name="" id="" class="form-control" value="80">
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection