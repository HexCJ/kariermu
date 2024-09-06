@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        @include('partials.notification')
        <div class="row">
            <div class="modal fade" id="addDataKarir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Karir</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{-- add section --}}
                        <div class="modal-body">
                            <form action="{{ route('karir.update', ['id' => $siswa->nisn]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="status" class="text-secondary mb-3">Status</label>
                                            <select class="form-select form-select-sm py-2 mb-2 text-secondary"
                                                aria-label="Small select example" id="status" name="status"
                                                required>
                                                <option disabled selected>Pilih Status Anda</option>
                                                <option value="Bekerja"
                                                    {{ old('status') == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                                                <option value="Kuliah"
                                                    {{ old('status') == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                                                <option value="Wirausaha"
                                                    {{ old('status') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha
                                                </option>
                                                @if($status_siswa->status === 'Lulus')
                                                <option value="Menganggur"
                                                    {{ old('status') == 'Menganggur' ? 'selected' : '' }}>Menganggur
                                                </option>
                                                @endif
                                            </select>
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="tempat_kerja_kuliah" class="text-secondary mb-3"
                                                id="tempat"></label>
                                            <div class="input-group mb-2 d-none" id="input">
                                                <input type="text" value="{{ old('tempat_kerja_kuliah') }}"
                                                    class="form-control" id="tempat_kerja_kuliah"
                                                    name="tempat_kerja_kuliah">
                                            </div>
                                            @error('tempat_kerja_kuliah')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center"
                                                data-bs-dismiss="modal">Submit</button>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var statusSelect = document.getElementById('status');
                                                        var tempatLabel = document.getElementById('tempat');
                                                        var inputKarir = document.getElementById('input');
                                            
                                                        // Fungsi untuk memperbarui tampilan berdasarkan status yang dipilih
                                                        function updateDisplayBasedOnStatus(status) {
                                                            if (status === 'Bekerja') {
                                                                tempatLabel.textContent = 'Tempat Bekerja';
                                                                tempatLabel.classList.remove('d-none');
                                                                inputKarir.classList.remove('d-none');
                                                            } else if (status === 'Kuliah') {
                                                                tempatLabel.textContent = 'Tempat Kuliah';
                                                                tempatLabel.classList.remove('d-none');
                                                                inputKarir.classList.remove('d-none');
                                                            } else if (status === 'Wirausaha') {
                                                                tempatLabel.textContent = 'Tempat Berwirausaha';
                                                                tempatLabel.classList.remove('d-none');
                                                                inputKarir.classList.remove('d-none');
                                                            } else if (status === 'Menganggur') {
                                                                tempatLabel.classList.add('d-none');
                                                                inputKarir.classList.add('d-none');
                                                            } else {
                                                                tempatLabel.classList.add('d-none');
                                                                inputKarir.classList.add('d-none');
                                                            }
                                                        }
                                            
                                                        // Perbarui tampilan saat halaman dimuat
                                                        var initialStatus = '{{ $siswa->status }}';
                                                        console.log(initialStatus);
                                                        updateDisplayBasedOnStatus(initialStatus);
                                            
                                                        // Perbarui tampilan saat pilihan status diubah
                                                        statusSelect.addEventListener('change', function() {
                                                            updateDisplayBasedOnStatus(this.value);
                                                        });
                                                    });
                                                </script>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="modal fade" id="editDataKarir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-sm-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Karir</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        {{-- add section --}}
                        <div class="modal-body">
                            <form action="{{ route('karir.update', ['id' => $siswa->nisn]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="status" class="text-secondary mb-3">Status</label>
                                            <select class="form-select form-select-sm py-2 mb-2 text-secondary"
                                                aria-label="Small select example" id="status-karir" name="status"
                                                required>
                                                <option disabled selected>Pilih Status Anda</option>
                                                <option value="Bekerja"
                                                    {{ $siswa->status == 'Bekerja' ? 'selected' : '' }}>Bekerja</option>
                                                <option value="Kuliah"
                                                    {{ $siswa->status == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                                                <option value="Wirausaha"
                                                    {{ $siswa->status == 'Wirausaha' ? 'selected' : '' }}>Wirausaha
                                                </option>
                                                @if($status_siswa->status === 'Lulus')
                                                    <option value="Menganggur"
                                                        {{ $siswa->status == 'Menganggur' ? 'selected' : '' }}>Menganggur
                                                    </option>
                                                @endif
                                            </select>
                                            @error('status')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="tempat_kerja_kuliah" class="text-secondary mb-3" id="tempat-karir">Tempat {{ $siswa->status }}</label>
                                            <div class="input-group mb-2" id="input-karir">
                                                <input type="text" value="{{ $siswa->tempat_kerja_kuliah }}" class="form-control" name="tempat_kerja_kuliah" required>
                                            </div>
                                            @error('tempat_kerja_kuliah')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                document.getElementById('status-karir').addEventListener('change', function() {
                                                    var statuskarir = this.value;
                                                    var tempatkarir = document.getElementById('tempat-karir');
                                                    var inputkarir = document.getElementById('input-karir');
    
                                                    // Tampilkan input yang sesuai dengan opsi yang dipilih
                                                    if (statuskarir === 'Bekerja') {
                                                        tempatkarir.classList.remove('d-none');
                                                        tempatkarir.textContent = 'Tempat Bekerja';
                                                        inputkarir.classList.remove('d-none');
                                                    } else if (statuskarir === 'Kuliah') {
                                                        tempatkarir.classList.remove('d-none');
                                                        tempatkarir.textContent = 'Tempat Kuliah';
                                                        inputkarir.classList.remove('d-none');
                                                    } else if (statuskarir === 'Wirausaha') {
                                                        tempatkarir.classList.remove('d-none');
                                                        tempatkarir.textContent = 'Tempat Berwirausaha';
                                                        inputkarir.classList.remove('d-none');
                                                    } else if(statuskarir === 'Menganggur') {
                                                        tempatkarir.classList.add('d-none');
                                                        inputkarir.classList.add('d-none');
                                                    }
                                                });
                                            });
                                            var form = document.querySelector('form');
                                            form.addEventListener('submit', function(event) {
                                                if (!form.checkValidity()) { // Jika validasi gagal
                                                    event.preventDefault(); // Mencegah formulir dikirim
                                                    event.stopPropagation(); // Mencegah penyebaran peristiwa ke atas
                                                } else { // Jika validasi berhasil
                                                    $('#editDataKarir').modal('hide'); // Menutup modal menggunakan jQuery
                                                }
                                                form.classList.add('was-validated'); // Menambahkan kelas untuk menunjukkan bahwa validasi telah dilakukan
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="button py-2 px-3 rounded text-decoration-none text-center"
                                        data-bs-dismiss="modal">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($siswa->status == false)
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex">
                        <h4>Laporan Data Karir Siswa</h4>
                        {{-- jika gak ada --}}
                        @if ($siswa->status == false)
                            <button type="button" class="py-1 px-3 text-center align-items-center d-flex rounded text-decoration-none button ms-auto" data-bs-toggle="modal" data-bs-target="#addDataKarir"><i class="fa-solid fa-briefcase me-2"></i>Lapor Karir</button>
                        @endif
                    </div>
                    <div class="alert-alert-warning d-flex flex-column text-center d-flex justify-content-center align-items-center"
                        style="height: 90vh" data-aos="fade-up">
                        <img src="{{ asset('img/data_kosong.png') }}" alt="" class="data-kosong">
                        <p class="fw-semibold mt-5 mb-0">Anda Belum Melaporkan Data Karir</p>
                        <p class="mt-2">Segera Laporkan Karir Anda</p>
                    </div>
                </div>
            </div>
        @elseif($siswa->status == true)
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="d-flex mb-3">
                        <h4>Status Karir</h4>
                    </div>
                </div>
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col p-0">
                            <div class="mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-4 text-center">
                                            <img src="{{ asset('img/pengumuman.png') }}" alt="" class="status-foto">
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="row px-5 py-5">
                                                <div class="col-12">
                                                    <div class="form-group mb-4" data-aos="fade-up">
                                                        <label for="nama"><i
                                                                class="fa-solid fa-user-tag me-2"></i>Status Karir</label>
                                                        <p class="text-secondary mb-3 mt-2 p-2">{{ $siswa->status }}
                                                        </p>
                                                    </div>
                                                    @if ($siswa->status === 'Bekerja' || $siswa->status === 'Kuliah' || $siswa->status === 'Wirausaha')
                                                        {{-- Alamat --}}
                                                        @php
                                                            $status = $siswa->status;
                                                        @endphp
                                                        <div class="form-group mb-4" data-aos="fade-up">
                                                            <label for="nama"><i class="fa-solid fa-location-dot me-2"></i>Alamat Tempat {{ $status }}</label>
                                                            @if($siswa->tempat_kerja_kuliah == null)
                                                                <p class="text-danger mb-3 mt-2 p-2 border border-danger">
                                                                    Data anda kosong
                                                                </p>
                                                            @elseif ($siswa->tempat_kerja_kuliah)  
                                                                <p class="text-secondary mb-3 mt-2 p-2">
                                                                    {{ $siswa->tempat_kerja_kuliah }}
                                                                </p>
                                                            @endif 
                                                        </div>
                                                    @endif
                                                    <div class="d-flex justify-content-end mt-5">
                                                        <p class="position-absolute"><a href=""
                                                                class="cursor-pointer btn btn-success" data-bs-toggle="modal" 
                                                                data-bs-target="#editDataKarir"><i class="fa-regular fa-pen-to-square"></i></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection
