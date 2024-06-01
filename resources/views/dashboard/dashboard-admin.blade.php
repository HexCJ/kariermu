@extends('dashboard')
@section('dashboard-admin')
  <div class="container-fluid" data-aos="fade-up">
    {{-- admin /guru --}}
    <div class="row px-3">
      <div class="col-12 mt-4">
        <div class="d-flex justify-content-between" data-aos="fade-up">
          <h4 class="h4">Selamat Datang {{ $admin->name }} Di Dashboard SMKN 4 Tangerang</h4>
        </div>
        <div class="row mt-5 d-flex justify-content-start px-0 px-lg-3 px-xl-0 px-xl-1">
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-chalkboard-user icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Guru</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totalguru }}</h1>
              <a href="{{ route('guru') }}" class="detail text-secondary">detail data guru..</a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Siswa Aktif</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $siswa_belum }}</h1>
              <a href="siswa?jurusan=&kelas=&jenis_kelamin=&status=Belum+Lulus" class="detail text-secondary">detail siswa aktif..</a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-user-graduate icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Siswa Alumni</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $siswa_sudah }}</h1>
              <a href="siswa?jurusan=&kelas=&jenis_kelamin=&status=Lulus" class="detail text-secondary">detail siswa alumni..</a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-school-flag icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Jurusan</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totaljurusan }}</h1>
              <a href="{{ route('data-kelas') }}" class="detail text-secondary">detail jurusan..</a>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-md-5 col-xl-3 col-lg-3 d-flex px-3 px-md-2 mb-5 justify-content-md-start pe-2 mb-3 mt-3 mt-md-0" data-aos="fade-up">
            <div class="icon-round rounded-circle bg-purple p-3 text-center d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-chalkboard icon"></i>
            </div>
            <div class="d-flex flex-column gap-1 gap-sm-2 ms-3 ms-sm-3 ms-md-4">
              <p class="title-data fw-medium text-secondary">Mata Pelajaran</p>
              <h1 class="detail-data fw-bold text-primary-emphasis">{{ $totalmapel }}</h1>
              <a href="{{ route('mapel') }}" class="detail text-secondary">detail mata pelajaran..</a>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          {{-- chart grafik data karir --}}
          <div class="col-12 col-md-7">
            <div class="card p-3">
              <h4 class="mb-5 mt-2">Presentase Data Siswa</h4>
              <div class="d-flex justify-content-center align-items-center">
                <canvas id="myChart" class="h-100 w-100"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-5 mt-3 mt-md-0">
            <div class="card p-3">
            <h4 class="mb-5 mt-2">Presentase Data Siswa</h4>
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
  <script>
    const ctx = document.getElementById('myChart');
    var siswa = {{ $siswa_belum }}
    var alumni = {{ $siswa_sudah }}
    var total_siswa

    persen_aktif = siswa / (siswa + alumni) *100;
    persen_alumni = alumni / (siswa + alumni) *100;

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
        
        labels: ['Siswa Aktif '+persen_aktif+'%', 'Siswa Alumni '+persen_alumni+'%', ],
        datasets: [{
          label: 'Data Siswa',
          data: [siswa, alumni],
          backgroundColor: [
            '#80baffc9',
            '#ffb3ba',
          ],
          borderColor: [
            '#80baffc9',
            '#ff6f69',
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
          labels: ['Siswa Aktif '+persen_aktif+'%', 'Siswa Alumni '+persen_alumni+'%'],
          datasets: [
            {
              label: "Presentase Data Siswa",
              data: [siswa, alumni],
              backgroundColor: [
            '#80baffc9',
            '#ffb3ba',
          ],
          borderColor: [
            '#80baffc9',
            '#ff6f69',
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