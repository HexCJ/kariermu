<nav class="navbar navbar-expand-lg navbar-dark d-block d-md-none navbar-color">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Kariermu.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header bg-sidebar">
        <h5 class="offcanvas-title text-light" id="offcanvasExampleLabel">Kariermu.</h5>
        <button type="button" class="ms-auto button button-s" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="offcanvas-body bg-sidebar">
        <div>
          <div class="col bg-sidebar sidebar min-vh-100">
            <ul class="p-0 d-flex flex-column d-flex justify-content-center align-items-center gap-2">
                {{-- profile --}}
                @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru') || auth()->user()->hasRole('siswa'))
                  <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Profile") ? 'list-active' : '' }} text-md-start">
                      {{-- paddingnya di a href --}}
                      <a href="{{ route('profile') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-user me-3"></i>Profile</a>
                  </li>
                  {{-- dashboard --}}
                  <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Dashboard") ? 'list-active' : '' }} text-md-start">
                    {{-- paddingnya di a href --}}
                    <a href="{{ route('dashboard') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-house-chimney-user me-3"></i>Dashboard</a>
                  </li>
                @endif
                @if(auth()->user()->hasRole('admin'))
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Jurusan") ? 'list-active' : '' }} text-md-start">
                  {{-- paddingnya di a href --}}
                  <a href="{{ route('data-kelas') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
                </li>
                {{-- data kelas --}}
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Mata Pelajaran") ? 'list-active' : '' }} text-md-start">
                    {{-- paddingnya di a href --}}
                    <a href="{{ route('mapel') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-chalkboard me-3"></i>Data Mata Pelajaran</a>
                </li>
                {{-- data guru --}}
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Users" || $title == "Tambah Data Users" || $title == "Edit Data Users") ? 'list-active' : '' }} text-md-start">
                    <a href="{{ route('users') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-users me-3"></i>Users</a>
                </li>
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Guru" || $title == "Tambah Data Guru" || $title == "Edit Data Guru") ? 'list-active' : '' }} text-md-start">
                    <a href="{{ route('guru') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
                </li>
                {{-- data siswa --}}
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Siswa" || $title == "Tambah Data Siswa" || $title == "Edit Data Siswa") ? 'list-active' : '' }} text-md-start">
                    <a href="{{ route('siswa') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
                </li>
                @endif
                @if(auth()->user()->hasRole('guru'))
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Jurusan") ? 'list-active' : '' }} text-md-start">
                  {{-- paddingnya di a href --}}
                  <a href="{{ route('data-kelas') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
                </li>
                {{-- data kelas --}}
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Mata Pelajaran") ? 'list-active' : '' }} text-md-start">
                    {{-- paddingnya di a href --}}
                    <a href="{{ route('mapel') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-chalkboard me-3"></i>Data Mata Pelajaran</a>
                </li>
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Guru" || $title == "Tambah Data Guru" || $title == "Edit Data Guru") ? 'list-active' : '' }} text-md-start">
                    <a href="{{ route('guru') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
                </li>
                {{-- data siswa --}}
                <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Siswa" || $title == "Tambah Data Siswa" || $title == "Edit Data Siswa") ? 'list-active' : '' }} text-md-start">
                    <a href="{{ route('siswa') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
                </li>
                <li class="list-group list  w-100 text-medium cursor-pointer {{ ($title == "Verifikasi Nilai") ? 'list-active' : '' }} text-md-start">
                  <a href="{{ route('verifikasi') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-clipboard-check me-3"></i>Verifikasi Nilai</a>
                </li>
                @endif
                @if (auth()->user()->hasRole('siswa'))
                  {{-- data karir --}}
                  <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Karir") ? 'list-active' : '' }} text-md-start">
                      <a href="{{ route('karir') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-briefcase me-3"></i>Data Karir</a>
                  </li>
                  @php
                    $user = auth()->user();
                    $nisn = auth()->user()->nisn;
                    $berkuliah = $user->laporan()->where('nisn',$nisn)->where('status','Kuliah')->exists();
                  @endphp
                  @if ($berkuliah)
                  {{-- data nilai  --}}
                  <li class="list-group w-100 list text-medium cursor-pointer {{ ($title == "Data Nilai Siswa" || $title == "Detail Data Nilai Siswa") ? 'list-active' : '' }} text-md-start">
                      <a href="{{ route('datanilai') }}" class="a-icon py-2 px-3"><i class="fa-solid fa-chart-column me-3"></i>Data Nilai</a>
                  </li>
                  @endif
                @endif
                {{-- logout --}}
                <li class="list-group w-100 list-logout text-medium cursor-pointer rounded text-md-start">
                    <form  action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="button-logout a-icon py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-3"></i>Logout</a>
                    </form>
                </li>
            </ul> 
        </div>
        </div>
      </div>
    </div>
  </div>
</nav>