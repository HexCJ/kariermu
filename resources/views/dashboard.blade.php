@extends('layouts.app')
@section('content')
    @if (auth()->user()->HasRole('admin'))
        @yield('dashboard-admin')
    @endif
    @if (auth()->user()->HasRole('guru'))
        @yield('dashboard-guru')
    @endif
    @if (auth()->user()->HasRole('siswa'))
        @yield('dashboard-siswa')
    @endif
@endsection
