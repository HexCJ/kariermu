<div class="col-2 bg-sidebar sidebar p-3 min-vh-100 position-fixed d-none d-md-block min-vh-100 mb-5">
    <div class="text-center border-bottom mb-4 d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('img/logo1.png') }}" alt="" width="50px" class="mt-3 mb-3 d-none d-sm-block">
        <p class="mt-1 text-light mb-3">Kariermu.</p>
    </div>
    <ul class="p-0 d-flex flex-column d-flex gap-2 overflow-y-auto" style="height: 80vh">
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru') || auth()->user()->hasRole('siswa'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Profile") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('profile') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-user me-3"></i>Profile</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Dashboard") || ($title == "Detail Siswa Menganggur") || ($title == "Detail Siswa Bekerja") || ($title == "Detail Siswa Berkuliah") || ($title == "Detail Siswa Berwirausaha") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('dashboard') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-house-chimney-user me-3"></i>Dashboard</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('admin'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Jurusan") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('data-kelas') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Mata Pelajaran") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('mapel') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard me-3"></i>Data Mata Pelajaran</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Users" || $title == "Tambah Data Users" || $title == "Edit Data Users") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('users') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-users me-3"></i>Users</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Admin" || $title == "Tambah Data Admin" || $title == "Edit Data Admin") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('admin') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-user-gear me-3"></i>Admin</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Guru" || $title == "Tambah Data Guru" || $title == "Edit Data Guru") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('guru') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Siswa" || $title == "Tambah Data Siswa" || $title == "Edit Data Siswa") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('siswa') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('guru'))
        {{-- <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Jurusan") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('data-kelas') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Mata Pelajaran") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('mapel') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard me-3"></i>Data Mata Pelajaran</a>
        </li> --}}
        {{-- <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Guru" || $title == "Tambah Data Guru" || $title == "Edit Data Guru") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('guru') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
        </li> --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Siswa" || $title == "Tambah Data Siswa" || $title == "Edit Data Siswa") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('siswa') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Verifikasi Nilai") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('verifikasi') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-clipboard-check me-3"></i>Verifikasi Nilai</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('siswa'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Karir") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('karir') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-briefcase me-3"></i>Data Karir</a>
        </li>
            @php
                $user = auth()->user();
                $nisn = auth()->user()->nisn;
                $berkuliah = $user->laporan()->where('nisn',$nisn)->where('status','Kuliah')->exists();
            @endphp
            @if ($berkuliah)
            <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Nilai Siswa" || $title == "Detail Data Nilai Siswa") ? 'list-active' : '' }} text-center text-md-start">
                <a href="{{ route('datanilai') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chart-column me-3"></i>Data Nilai</a>
            </li>
            @endif
        @endif
        <li class="list-group list-logout text-medium cursor-pointer text-center rounded text-md-start mb-5">
            <form  action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button-logout a-icon d-none d-md-block py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-3"></i>Logout</a>
            </form>
        </li>
    </ul> 
</div> 
