@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @include('partials.notification')
  {{-- Siswa --}}
  @if (auth()->user()->hasRole('siswa'))
  @yield('profile-siswa')
  @endif
    {{-- Guru --}}
  @if (auth()->user()->hasRole('guru'))
  @yield('profile-guru')
  @endif
  {{-- Admin --}}
  @if (auth()->user()->hasRole('admin'))
  @yield('profile-admin')
  @endif
</div>
@endsection