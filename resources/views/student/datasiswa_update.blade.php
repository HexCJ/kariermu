@extends('layouts.app')
@section('content')
    <form action="{{ route('user.update', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <h4>Edit Data Siswa</h4>
                    <form action="">
                        <div class="row mb-3 mt-5">
                            <div class="mb-4 col-12">
                                <label for="nisn" class="text-secondary mb-3">NISN</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nisn" name="nisn"
                                        value="{{ $data->nisn }}">
                                </div>
                            </div>
                            <div class="mb-4 col-12">
                                <label for="photo" class="text-secondary mb-3">Foto</label>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="">
                                            @if ($data->image)
                                                <img src="{{ asset('storage/photo-user/' . $data->image) }}"
                                                    class="profile-foto w-100" alt="">
                                            @elseif($data->jenis_kelamin === 'Laki-laki')
                                                <img src="{{ asset('img/sma_profile1.png') }}" class="profile-foto w-100"
                                                    alt="">
                                            @elseif($data->jenis_kelamin === 'Perempuan')
                                                <img src="{{ asset('img/sma_profile2.png') }}" class="profile-foto w-100"
                                                    alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="photo" name="photo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="nama" class="text-secondary mb-3">Nama Lengkap</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $data->name }}">
                                </div>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="jkelamin" class="text-secondary mb-3">Jenis Kelamin</label>
                                <select class="form-select form-select-sm py-2 mb-3 text-secondary"
                                    aria-label="Small select example" id="jkelamin" name="jkelamin">
                                    <option disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="jurusan" class="text-secondary mb-3">Jurusan</label>
                                <select class="form-select form-select-sm py-2 mb-3 text-secondary"
                                    aria-label="Small select example" id="jurusan" name="jurusan">
                                    <option selected disabled>Pilih Jurusan</option>
                                    @foreach ($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id_jurusan }}"
                                            {{ $data->jurusan == $jurusan->id_jurusan ? 'selected' : '' }}>
                                            {{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4 col-6">
                                <label for="kelas" class="text-secondary mb-3">Kelas</label>
                                <select class="form-select form-select-sm py-2 mb-3 text-secondary"
                                    aria-label="Small select example" id="kelas" name="kelas">
                                    <option value="X" {{ $data->kelas == 'X' ? 'selected' : '' }}>X/SEPULUH</option>
                                    <option value="XI" {{ $data->kelas == 'XI' ? 'selected' : '' }}>XI/SEBELAS</option>
                                    <option value="XII" {{ $data->kelas == 'XII' ? 'selected' : '' }}>XII/DUA BELAS
                                    </option>
                                </select>
                            </div>
                            <div class="mb-4 col-12">
                                <label for="urutan_kelas" class="text-secondary mb-3">Urutan Kelas</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="urutan_kelas" name="urutan_kelas"
                                        value="{{ $data->urutan_kelas }}">
                                </div>
                            </div>
                            <div class="mb-4 col-12">
                                <label for="email" class="text-secondary mb-3">Email</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $data->email }}">
                                </div>
                            </div>
                            <div class="mb-4 col-12">
                                <label for="alamat" class="text-secondary mb-3">Alamat</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $data->alamat }}">
                                </div>
                            </div>
                            <div class="mb-4 col-12">
                                <label for="status" class="text-secondary mb-3">Status</label>
                                <select class="form-select form-select-sm py-2 mb-3 text-secondary"
                                    aria-label="Small select example" id="status" name="status">
                                    <option value="Belum Lulus" {{ $data->status == 'Belum Lulus' ? 'selected' : '' }}
                                        id="aktif">Siswa Aktif</option>
                                    <option value="Lulus" {{ $data->status == 'Lulus' ? 'selected' : '' }}
                                        id="alumni">Alumni</option>
                                </select>
                            </div>
                            <div class="mb-4 col-12" id="lulus">
                                <label for="lulus" class="text-secondary mb-3">Tahun Lulus</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="lulus"
                                        value="{{ $data->tahun_lulus }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-5">
                            <a href="../" class="btn px-3 btn-secondary">Close</a>
                            <button type="submit"
                                class="button py-2 px-3 rounded text-decoration-none text-center ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var statusSelect = document.getElementById('status');
            var tahunLulusInput = document.getElementById('lulus');

            // Sembunyikan input tahun lulus saat halaman dimuat
            tahunLulusInput.style.display = 'none';

            // Tambahkan event listener untuk perubahan pada select status
            statusSelect.addEventListener('change', function() {
                if (statusSelect.value === 'Lulus') {
                    // Jika status Alumni dipilih, tampilkan input tahun lulus
                    tahunLulusInput.style.display = 'block';
                } else {
                    // Jika status Siswa Aktif dipilih, sembunyikan input tahun lulus
                    tahunLulusInput.style.display = 'none';
                }
            });
        });
    </script>
@endsection
