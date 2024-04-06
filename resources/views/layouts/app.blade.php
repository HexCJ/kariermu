<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Kariermu | {{ $title }}</title>

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">

</head>

<body>
    <div class="container-fluid mb-5">
        <div class="row">
            @include('partials.sidebar')
            <div class="col-2">

            </div>
            <div class="col-10 mt-3">
                @yield('content')
            </div>
        </div>
    </div>

{{-- bootstrap js --}}
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- chart js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- table --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>

<script src="{{ asset('js/script.js') }}"></script>

{{-- chart data karir --}}
<script>
  new DataTable('#dataSiswa');
  new DataTable('#dataNilai');
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',

    data: {
      labels: ['Pengangguran', 'Bekerja', 'Kuliah', 'Wirausaha'],
      datasets: [{
        label: 'Presentase Data Karir Siswa',
        data: [50, 1600, 500, 600],
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

{{-- chart nilai --}}
{{-- <script>
  // <block:segmentUtils:1>
  const skipped = (dataNilai, value) => dataNilai.p0.skip || dataNilai.p1.skip ? value : undefined;
  const down = (dataNilai, value) => dataNilai.p0.parsed.y > dataNilai.p1.parsed.y ? value : undefined;
  // </block:segmentUtils>

  // <block:genericOptions:2>
  const genericOptions = {
    fill: false,
    interaction: {
      intersect: false
    },
    radius: 0,
  };
  // </block:genericOptions>

  // <block:config:0>
  const nilaiData = [83, 85.4, 90, 86, 85];
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
    options:{
      scale:{
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
</script> --}}
</body>
</html>
