@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    {{-- list siswa menganggur --}}
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>List Siswa Menganggur</h4>
      </div>
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col p-0">
            <div class="input-group mb-3 mt-3">
              <div class="dropdown">
                <button class="btn dropdown-toggle ps-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type="button">A-Z</button></li>
                  <li><button class="dropdown-item" type="button">Z-A</button></li>
                  <li><button class="dropdown-item" type="button">Kejuruan</button></li>
                  <li><button class="dropdown-item" type="button">Tahun Ajaran</button></li>
                </ul>
              </div>
              <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari siswa berdasarkan NIP atau Nama">
            </div>
            <div class="card mt-3" style="height: 43rem">
              <div class="card-body table-responsive" style="background-color: #FCFAFA;">
                <table class="table table-bordered">
                  <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kejuruan</th>
                    <th>Tahun Kelulusan</th>
                    <th>Status Karir</th>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Cahyo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Ajeril Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- list siswa bekerja --}}
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>List Siswa Bekerja</h4>
      </div>
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col p-0">
            <div class="input-group mb-3 mt-3">
              <div class="dropdown">
                <button class="btn dropdown-toggle ps-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type="button">A-Z</button></li>
                  <li><button class="dropdown-item" type="button">Z-A</button></li>
                  <li><button class="dropdown-item" type="button">Kejuruan</button></li>
                  <li><button class="dropdown-item" type="button">Tahun Ajaran</button></li>
                </ul>
              </div>
              <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari siswa berdasarkan NIP atau Nama">
            </div>
            <div class="card mt-3" style="height: 43rem">
              <div class="card-body table-responsive" style="background-color: #FCFAFA;">
                <table class="table table-bordered">
                  <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kejuruan</th>
                    <th>Tahun Kelulusan</th>
                    <th>Status Karir</th>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Cahyo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>BEKERJA</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Ajeril Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>BEKERJA</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>BEKERJA</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>BEKERJA</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>BEKERJA</td>
                  </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- list siswa kuliah --}}
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>List Siswa Berkuliah</h4>
      </div>
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col p-0">
            <div class="input-group mb-3 mt-3">
              <div class="dropdown">
                <button class="btn dropdown-toggle ps-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type="button">A-Z</button></li>
                  <li><button class="dropdown-item" type="button">Z-A</button></li>
                  <li><button class="dropdown-item" type="button">Kejuruan</button></li>
                  <li><button class="dropdown-item" type="button">Tahun Ajaran</button></li>
                </ul>
              </div>
              <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari siswa berdasarkan NIP atau Nama">
            </div>
            <div class="card mt-3" style="height: 43rem">
              <div class="card-body table-responsive" style="background-color: #FCFAFA;">
                <table class="table table-bordered">
                  <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kejuruan</th>
                    <th>Tahun Kelulusan</th>
                    <th>Status Karir</th>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Cahyo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Ajeril Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- list siswa wirausaha --}}
    <div class="col-12 mt-4">
      <div class="d-flex">
        <h4>List Siswa Berwirausaha</h4>
      </div>
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col p-0">
            <div class="input-group mb-3 mt-3">
              <div class="dropdown">
                <button class="btn dropdown-toggle ps-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                <ul class="dropdown-menu">
                  <li><button class="dropdown-item" type="button">A-Z</button></li>
                  <li><button class="dropdown-item" type="button">Z-A</button></li>
                  <li><button class="dropdown-item" type="button">Kejuruan</button></li>
                  <li><button class="dropdown-item" type="button">Tahun Ajaran</button></li>
                </ul>
              </div>
              <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Cari siswa berdasarkan NIP atau Nama">
            </div>
            <div class="card mt-3" style="height: 43rem">
              <div class="card-body table-responsive" style="background-color: #FCFAFA;">
                <table class="table table-bordered">
                  <tr>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kejuruan</th>
                    <th>Tahun Kelulusan</th>
                    <th>Status Karir</th>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Cahyo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Ajeril Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2022</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  <tr>
                    <td>3671800912</td>
                    <td>Jojo Kusumo</td>
                    <td>Rekayasa Perangkat Lunak (RPL)</td>
                    <td>2021</td>
                    <td>KULIAH</td>
                  </tr>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection