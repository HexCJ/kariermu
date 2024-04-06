@extends('layouts.app')
@section('content')
<div class="container-fluid min-vh-100">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between">
        <h4 class="h4">Data Nilai Siswa</h4>
      </div>
      <div class="container-fluid overflow-hidden">
        <div class="row d-flex justify-content-between">
          <div class="grafik_nilai col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-5 mb-xl-0 ms-0 ms-lg-0 ms-xl-0 mt-5 card">
            <h4 class="mt-3 ms-3 mb-3">Grafik Rata Rata Per Semester</h4>
            <div class="p-3">
              <canvas id="datanilai" class="h-100 w-100"></canvas>
            </div>
          </div>
          <div class="nilai col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 ms-0 ms-lg-5 ms-sm-0 mt-0 mt-md-5 card">
            <h4 class="mt-3 ms-3 mb-3">Nilai Rata-Rata</h4>
            <div class="container">
              <div class="row p-3">
                <div class="col-12 mb-3 bg-success rounded p-3 text-light">
                  <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between">
                      <h5>Semester 1</h5>
                      <p><i class="fa-regular fa-circle-check" style="font-size: 1.3rem"></i></p>
                    </div>
                    <p id="nilaiData">80</p>
                  </div>
                  <div class="d-flex justify-content-end">
                    <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                  </div>
                </div>
              </div>
              <div class="row p-3">
                <div class="col-12 mb-3 bg-success rounded p-3 text-light">
                  <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between">
                      <h5>Semester 2</h5>
                      <p><i class="fa-regular fa-circle-check" style="font-size: 1.3rem"></i></p>
                    </div>
                    <p id="nilaiData">81</p>
                  </div>
                  <div class="d-flex justify-content-end">
                    <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                  </div>
                </div>
              </div>
              <div class="row p-3">
                <div class="col-12 mb-3 bg-success rounded p-3 text-light">
                  <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between">
                      <h5>Semester 3</h5>
                      <p><i class="fa-regular fa-circle-check" style="font-size: 1.3rem"></i></p>
                    </div>
                    <p id="nilaiData">90</p>
                  </div>
                  <div class="d-flex justify-content-end">
                    <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                  </div>
                </div>
              </div>
              <div class="row p-3">
                <div class="col-12 mb-3 bg-danger rounded p-3 text-light">
                  <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between">
                      <h5>Semester 4</h5>
                      <p><i class="fa-regular fa-circle-xmark" style="font-size: 1.3rem"></i></p>
                    </div>
                    <p id="nilaiData">80</p>
                  </div>
                  <div class="d-flex justify-content-end">
                    <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                  </div>
                </div>
              </div>
              <div class="row p-3">
                <div class="col-12 mb-3 bg-dark-subtle rounded p-3 text-light">
                  <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between">
                      <h5>Semester 5</h5>
                      <p><i class="fa-solid fa-clock-rotate-left" style="font-size: 1.3rem"></i></p>
                    </div>
                    <p id="nilaiData">80</p>
                  </div>
                  <div class="d-flex justify-content-end">
                    <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection