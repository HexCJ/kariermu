@extends('dashboard')
@section('dashboard-guru')
  <div class="container-fluid" data-aos="fade-up">
    {{-- admin /guru --}}
    <div class="row px-3">
      <div class="col-12 mt-4">
        <div class="d-flex justify-content-between" data-aos="fade-up">
          <h4 class="h4">Selamat Datang {{ $guru->name }} Di Dashboard SMKN 4 Tangerang</h4>
        </div>
        <div class="row mt-5 d-flex justify-content-center px-0 px-lg-3 px-xl-0 px-xl-1">
          {{-- data status karir tidak bekerja --}}
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-users-line icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Pengangguran</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totaltkerja }}</h1>
              <a href="{{ route('detail.tidakkerja') }}" class="detail text-secondary">detail siswa menganggur..</a>
            </div>
          </div>
          {{-- Data status karir bekerja --}}
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="icon fa-solid fa-briefcase"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Bekerja</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totalkerja }}</h1>
              <a href="{{ route('detail.kerja') }}" class="detail text-secondary">detail siswa bekerja..</a>
            </div>
          </div>
          {{-- data status karir kuliah --}}
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="icon fa-solid fa-graduation-cap a-icon"></i>
              {{-- <i class="fa-solid fa-user-graduate a-icon icon"></i> --}}
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Kuliah</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totalkuliah }}</h1>
              <a href="{{ route('detail.kuliah') }}" class="detail text-secondary">detail siswa berkuliah..</a>
            </div>
          </div>
          {{-- data status karir wirausaha --}}
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-shop a-icon icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Wirausaha</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totalwirausaha }}</h1>
              <a href="{{ route('detail.wirausaha') }}" class="detail text-secondary">detail siswa berwirausaha..</a>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          {{-- chart grafik data karir --}}
          <div class="col-12 col-md-7">
            <div class="card p-3">
              <h4 class="mb-5 mt-2">Presentase Data Karir</h4>
              <div class="d-flex justify-content-center align-items-center">
                <canvas id="myChart" class="h-100 w-100"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-5 mt-3 mt-md-0">
            <div class="card p-3">
            <h4 class="mb-5 mt-2">Presentase Data Karir</h4>
            <div class="d-flex justify-content-center align-items-center">
              <div class="w-75">
                <canvas id="doughnut-chart"></canvas>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- chart data karir --}}
  <script>
    const ctx = document.getElementById('myChart');
    var p = {{ $totaltkerja }}
    var k = {{ $totalkerja }}
    var kl = {{ $totalkuliah }}
    var w = {{ $totalwirausaha }}
    var total = p + k + kl + w

    var persenp = p /total * 100;
    var persenk = k / total * 100;
    var persenkl = kl / total * 100;
    var persenw = w / total * 100;
    var persentotal = total * total * 100;
    new Chart(ctx, {
      type: 'bar',

      data: {
        
        labels: ['Pengangguran '+persenp+'%', 'Bekerja '+ persenk+'%', 'Kuliah '+persenkl+'%', 'Wirausaha '+persenw+'%'],
        datasets: [{
          label: 'Presentase Data Karir Siswa',
          data: [p, k, kl, w],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
            borderWidth: 1,
          }]
      },
      options: {
        // indexAxis:'y',
        plugins: {
          // title: {
          //       display: true, 
          //       text: 'Presentase Data Karir Siswa'
          // },
        },
        scales: {
          x: {
            title: {
              display: true, 
              text: 'Status Karir Siswa'
            },
          },
          y: {
            title: {
              display: true,
              text: 'Jumlah Data Siswa'
            },
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script>
      new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
          labels: ['Pengangguran '+persenp+'%', 'Bekerja '+ persenk+'%', 'Kuliah '+persenkl+'%', 'Wirausaha '+persenw+'%'],
          datasets: [
            {
              label: "Presentase Data Karir",
              data: [p, k, kl, w],
              backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
          ],
          borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
          ],
            borderWidth: 1,
          }]
        },
        options: {
          title: {
            display: true,
          }
        }
    });
  </script>
@endsection