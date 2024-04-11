<div class="col-2 bg-sidebar sidebar p-3 min-vh-100 position-fixed">
    <div class="text-center border-bottom mb-4 d-flex justify-content-center align-items-center flex-column">
        <img src="{{ asset('img/logo1.png') }}" alt="" width="70px" class="mt-3 mb-3 d-none d-sm-block">
        <p class="mt-1 text-light mb-3">Kariermu.</p>
    </div>
    <ul class="p-0 d-flex flex-column d-flex justify-content-center align-items-center gap-2">
        {{-- profile --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Profile") ? 'list-active' : '' }} text-center text-md-start">
            {{-- paddingnya di a href --}}
            <a href="/profile" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-user me-3"></i>Profile</a>
            <a href="/profile" class="a-icon d-block d-md-none py-2 px-3 text-center"><i class="fa-solid fa-user"></i></a>
        </li>
        {{-- dashboard --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Dashboard") ? 'list-active' : '' }} text-center text-md-start">
            {{-- paddingnya di a href --}}
            <a href="/dashboard" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-house-chimney-user me-3"></i>Dashboard</a>
            <a href="/dashboard" class="a-icon d-block d-md-none py-2 px-3 text-center"><i class="fa-solid fa-house-chimney-user"></i></a>
        </li>
        {{-- data kelas --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Jurusan") ? 'list-active' : '' }} text-center text-md-start">
            {{-- paddingnya di a href --}}
            <a href="{{ route('data-kelas') }}" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-school-flag me-3"></i>Data Jurusan</a>
            <a href="{{ route('data-kelas') }}" class="a-icon d-block d-md-none py-2 px-3 text-center"><i class="fa-solid fa-school-flag"></i></a>
        </li>
        {{-- data guru --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Guru" || $title == "Tambah Data Guru" || $title == "Edit Data Guru") ? 'list-active' : '' }} text-center text-md-start">
            <a href="/guru" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chalkboard-user me-3"></i>Guru</a>
            <a href="/guru" class="a-icon text-center d-block d-md-none py-2 px-3 text-center"><i class="fa-solid fa-chalkboard-user"></i></a>
        </li>
        {{-- data siswa --}}
        @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('penulis'))
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Siswa" || $title == "Tambah Data Siswa" || $title == "Edit Data Siswa") ? 'list-active' : '' }} text-center text-md-start">
            <a href="/siswa" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-graduation-cap me-3"></i>Siswa</a>
            <a href="/siswa" class="a-icon d-block d-md-none py-2 px-3 text-center"><i class="fa-solid fa-graduation-cap"></i></a>
        </li>
        @endif
        {{-- data karir --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Karir") ? 'list-active' : '' }} text-center text-md-start">
            <a href="/karir" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-briefcase me-3"></i>Data Karir</a>
            <a href="/karir" class="a-icon d-block d-md-none py-2 px-3"><i class="fa-solid fa-briefcase"></i></a>
        </li>
        {{-- data nilai  --}}
        <li class="list-group list text-medium cursor-pointer {{ ($title == "Data Nilai Siswa" || $title == "Detail Data Nilai Siswa") ? 'list-active' : '' }} text-center text-md-start">
            <a href="/nilai" class="a-icon d-none d-md-block py-2 px-3"><i class="fa-solid fa-chart-column me-3"></i>Data Nilai</a>
            <a href="/nilai" class="a-icon d-block d-md-none py-2 px-3"><i class="fa-solid fa-chart-column"></i></a>
        </li>
        {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
        </form> --}}
        {{-- logout --}}
        <li class="list-group list-logout text-medium cursor-pointer text-center rounded text-md-start">
            <form  action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="button-logout a-icon d-none d-md-block py-2 px-3 rounded"><i class="fa-solid fa-right-from-bracket me-3"></i>Logout</a>
                <button type="submit "class="button-logout rounded a-icon d-block d-md-none py-2 px-3" style="text-align: center"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </li>
    </ul> 
</div> 
