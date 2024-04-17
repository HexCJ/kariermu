<div class="col-2 bg-sidebar sidebar p-3 min-vh-100 position-fixed d-none d-md-block">
    <div class="text-center border-bottom mb-4 d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('img/logo1.png') }}" alt="" width="70px" class="mt-3 mb-3 d-none d-sm-block">
        <p class="mt-1 text-light mb-3">Kariermu.</p>
    </div>
    <ul class="p-0 d-flex flex-column d-flex justify-content-center align-items-center gap-2">
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru') || auth()->user()->hasRole('siswa'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Profile") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('profile') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-user me-3"></i>Profile</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Dashboard") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('dashboard') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-house-chimney-user me-3"></i>Dashboard</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Jurusan") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('data-kelas') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Mata Pelajaran") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('mapel') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard me-3"></i>Data Mata Pelajaran</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Guru" || $title == "Tambah Data Guru" || $title == "Edit Data Guru") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('guru') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Siswa" || $title == "Tambah Data Siswa" || $title == "Edit Data Siswa") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('siswa') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
        </li>
        @endif
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('guru') || auth()->user()->hasRole('siswa'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Karir") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('karir') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-briefcase me-3"></i>Data Karir</a>
        </li>
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Nilai Siswa" || $title == "Detail Data Nilai Siswa") ? 'list-active' : '' }} text-center text-md-start">
            <a href="{{ route('datanilai') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chart-column me-3"></i>Data Nilai</a>
        </li>
        @endif
        <li class="list-group list-logout text-medium cursor-pointer text-center rounded text-md-start">
            <form  action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button-logout a-icon d-none d-md-block py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-3"></i>Logout</a>
            </form>
        </li>
    </ul> 
</div> 
