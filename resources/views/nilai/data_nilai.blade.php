@extends('layouts.app')
@section('content')
<div class="container-fluid min-vh-100">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="d-flex justify-content-between">
        <h4 class="h4">Data Nilai Siswa</h4>
      </div>
      <div class="container-fluid" data-aos="fade-up">
        <div class="row d-flex">
          <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-5 mb-xl-0 ms-0 ms-lg-0 ms-xl-0 mt-5">
            <div class="p-3 card">
            <h4 class="mt-3 ms-3 mb-3">Grafik Rata Rata Per Semester</h4>
              <canvas id="datanilai" class="h-100 w-100"></canvas>
            </div>
          </div>
          <div class="nilai col-12 col-sm-12 col-md-12 overflow-visible col-lg-4 col-xl-4 ms-sm-0 mt-0 mt-md-5">
            <div class="p-3 card">
              <h4 class="mt-3 ms-3 mb-3">Nilai Rata-Rata</h4>
              <div class="container">
                <div class="row p-3">
                  <div class="col-12 mb-3 bg-primary rounded p-3 text-light">
                    <div class="d-flex flex-column gap-2">
                      <div class="d-flex justify-content-between">
                        <h5>Semester 1</h5>
                      </div>
                      <p id="nilaiData">Anda Belum Menginputkan Nilai</p>
                    </div>
                    <div class="d-flex justify-content-end">
                      <a href="/nilai/detail_nilai1" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi bi-box-arrow-in-down-right"></i></a>
                      <a href="/nilai/add_nilai1" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi-plus-circle"></i></a>
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
                      <a href="/nilai/detail_nilai2" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi bi-box-arrow-in-down-right"></i></a>
                      <a href="/nilai/add_nilai2" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi-plus-circle"></i></a>
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
                    {{-- <div class="d-flex justify-content-end">
                      <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                    </div> --}}
                    <div class="d-flex justify-content-end">
                      <a href="/nilai/detail_nilai3" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi bi-box-arrow-in-down-right"></i></a>
                      <a href="/nilai/add_nilai3" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi-plus-circle"></i></a>
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
                    {{-- <div class="d-flex justify-content-end">
                      <a href="/nilai/detail_nilai" class="text-decoration-none text-light">detail nilai..</a>
                    </div> --}}
                    <div class="d-flex justify-content-end">
                      <a href="/nilai/detail_nilai4" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi bi-box-arrow-in-down-right"></i></a>
                      <a href="/nilai/add_nilai4" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi-plus-circle"></i></a>
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
                      <a href="/nilai/detail_nilai5" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi bi-box-arrow-in-down-right"></i></a>
                      <a href="/nilai/add_nilai5" class="text-decoration-none text-light rounded-circle" style="font-size: 1.3rem"><i class="bi bi-plus-circle"></i></a>
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

    // Menggunakan nilai-nilai tersebut dalam variabel nilaiData
    const nilaiData = [rata1, rata2, rata3, rata4, rata5];

const dataNilai = document.getElementById('datanilai');
new Chart(dataNilai, {
    type: 'line',
    data: {
        labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5'],
        datasets: [{
            label: 'Grafik Nilai Per Semester',
            data: nilaiData,
            borderColor: 'rgb(75, 192, 192)',
            segment: {
                borderColor: dataNilai => skipped(dataNilai, 'rgb(0,0,0,0.2)') || down(dataNilai, 'rgb(192,75,75)'),
                borderDash: dataNilai => skipped(dataNilai, [6, 6]),
            },
            spanGaps: true
        }]
    },
    options: {
        scale: {
            y: {
                suggestedMax: 100,
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