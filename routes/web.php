<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serverSide;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataKarirController;
use App\Http\Controllers\DataNilaiController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route laravel breezer
Route::get('/',[Controller::class,'index']);

// Route::get('/siswa/search', ['SiswaController@search'])->name('search');



// Route::get('/profile',[ProfileController::class,'index'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth', 'verified')->name('profile');
Route::put('/profile/updateprofile/{id}', [ProfileController::class, 'profilefoto'])->middleware('auth')->name('profile.foto');
Route::put('/profile/updateprofile-guru/{id}', [ProfileController::class, 'profilefotoguru'])->middleware('auth')->name('profile.foto-guru');
Route::put('/profile/updateprofile-admin/{id}', [ProfileController::class, 'profilefotoadmin'])->middleware('auth')->name('profile.foto-admin');
Route::put('profile/updatesiswa/{id}', [ProfileController::class, 'updatesiswa'])->middleware(['auth'])->name('profile.updatesiswa');
Route::put('profile/updateguru/{id}', [ProfileController::class, 'updateguru'])->middleware(['auth'])->name('profile.updateguru');
Route::put('profile/updateadmin/{id}', [ProfileController::class, 'updateadmin'])->middleware(['auth'])->name('profile.updateadmin');

// nilai
Route::get('/nilai',[DataNilaiController::class,'dataNilai'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai');
Route::get('/nilai/detail_nilai1',[DataNilaiController::class,'detailDataNilai1']);
Route::get('/nilai/detail_nilai2',[DataNilaiController::class,'detailDataNilai2']);
Route::get('/nilai/detail_nilai3',[DataNilaiController::class,'detailDataNilai3']);
Route::get('/nilai/detail_nilai4',[DataNilaiController::class,'detailDataNilai4']);
Route::get('/nilai/detail_nilai5',[DataNilaiController::class,'detailDataNilai5']);
Route::get('/nilai/detail_nilai6',[DataNilaiController::class,'detailDataNilai6']);
//store s1
Route::get('/nilai/add_nilai1',[DataNilaiController::class,'inputNilai1'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah');
Route::post('/nilai/add_nilaibaru1',[DataNilaiController::class,'store1'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai1.add');
//store s2
Route::get('/nilai/add_nilai2',[DataNilaiController::class,'inputNilai2'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah');
Route::post('/nilai/add_nilaibaru2',[DataNilaiController::class,'store2'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai2.add');
//store s3
Route::get('/nilai/add_nilai3',[DataNilaiController::class,'inputNilai3'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah');
Route::post('/nilai/add_nilaibaru3',[DataNilaiController::class,'store3'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai3.add');
//store s4
Route::get('/nilai/add_nilai4',[DataNilaiController::class,'inputNilai4'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah');
Route::post('/nilai/add_nilaibaru4',[DataNilaiController::class,'store4'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai4.add');
//store s5
Route::get('/nilai/add_nilai5',[DataNilaiController::class,'inputNilai5'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah');
Route::post('/nilai/add_nilaibaru5',[DataNilaiController::class,'store5'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai5.add');
//store s6
Route::get('/nilai/add_nilai6',[DataNilaiController::class,'inputNilai6'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah');
Route::post('/nilai/add_nilaibaru6',[DataNilaiController::class,'store6'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai6.add');

//update 1
Route::put('/nilai/update1{id}',[DataNilaiController::class,'update1'])->middleware('auth', 'verified', 'role:siswa','checkLaporanStatus:Kuliah')->name('datanilai1.update');


Route::get('/verifikasi_nilai',[DataNilaiController::class,'verifikasiGuru'])->middleware(['auth', 'verified','role:guru'])->name('verifikasi');
Route::get('/verifikasi_nilai/verifikasi/{nisn}',[DataNilaiController::class,'verifikasiGuruDetail'])->middleware(['auth', 'verified','role:guru'])->name('verifikasi.nilai');
Route::put('/verifikasi_nilai/verifikasi/{nisn}/tolak/{id}',[DataNilaiController::class,'tolakNilai'])->middleware(['auth', 'verified', 'role:guru'])->name('tolak.nilai');
Route::put('/verifikasi_nilai/verifikasi/{nisn}/terima/{id}',[DataNilaiController::class,'terimaNilai'])->middleware(['auth', 'verified', 'role:guru'])->name('terima.nilai');
Route::put('/verifikasi_nilai/verifikasi/tolaksemua/{nisn}/semester/{semester}',[DataNilaiController::class,'tolakNilaiSemua'])->middleware(['auth', 'verified', 'role:guru'])->name('tolak.nilai.semua');
Route::put('/verifikasi_nilai/verifikasi/terimasemua/{nisn}/semester/{semester}',[DataNilaiController::class,'terimaNilaiSemua'])->middleware(['auth', 'verified', 'role:guru'])->name('terima.nilai.semua');
// Route::put('/verifikasi_nilai/verifikasi/terima/{id}',[DataNilaiController::class,'terimaNilai'])->middleware(['auth', 'verified', 'role:guru'])->name('terima.nilai');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('detail_status/menganggur',[DashboardController::class, 'detailStatusTidakKerja'])->middleware(['auth'])->name('detail.tidakkerja');
Route::get('detail_status/kerja',[DashboardController::class, 'detailStatusKerja'])->middleware(['auth', 'verified'])->name('detail.kerja');
Route::get('detail_status/kuliah',[DashboardController::class, 'detailStatusKuliah'])->middleware(['auth', 'verified'])->name('detail.kuliah');
Route::get('detail_status/wirausaha',[DashboardController::class, 'detailStatusWira'])->middleware(['auth', 'verified'])->name('detail.wirausaha');
Route::get('detail_status/menganggur/download',[DashboardController::class, 'detailStatusTidakKerja_download'])->middleware(['auth'])->name('detail.tidakkerja.download');
Route::get('detail_status/bekerja/download',[DashboardController::class, 'detailStatusKerja_download'])->middleware(['auth'])->name('detail.kerja.download');
Route::get('detail_status/berkuliah/download',[DashboardController::class, 'detailStatusKuliah_download'])->middleware(['auth'])->name('detail.kuliah.download');
Route::get('detail_status/berwirausaha/download',[DashboardController::class, 'detailStatusWirausaha_download'])->middleware(['auth'])->name('detail.wirausaha.download');

//routing dan memberi izin kepada role
Route::get('admin',[Controller::class,'dashboardAdmin'])->middleware(['auth', 'verified', 'role:admin']);


// data guru
Route::get('guru',[GuruController::class,'index'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru');
Route::get('guru/tambah',[GuruController::class,'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah_guru');

// Route Admin
Route::get('admin',[AdminController::class,'admin'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin');
Route::get('admin/tambah',[AdminController::class, 'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.create');
Route::post('admin/tambah',[AdminController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.store');
Route::get('admin/edit/{id}',[AdminController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.edit');
Route::put('admin/update/{id}',[AdminController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.update');
Route::delete('/admin/hapus/{id}',[AdminController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.hapus');


Route::get('siswa',[SiswaController::class,'siswa'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa');
Route::get('siswa/tambah',[SiswaController::class, 'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa.create');
Route::post('siswa/tambah',[SiswaController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa.store');
Route::get('siswa/edit/{id}',[SiswaController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('user.edit');
Route::put('siswa/update/{id}',[SiswaController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('user.update');
Route::delete('/siswa/hapus/{id}',[SiswaController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa.hapus');
Route::post('/siswa/import',[SiswaController::class, 'import_siswa'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa.import');


// route guru
Route::get('guru',[GuruController::class,'guru'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru');
Route::get('guru/tambah',[GuruController::class, 'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.create');
Route::post('guru/tambah',[GuruController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.store');
Route::get('guru/edit/{id}',[GuruController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.edit');
Route::put('guru/update/{id}',[GuruController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.update');
Route::delete('/guru/hapus/{id}',[GuruController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.hapus');
Route::post('/guru/import',[GuruController::class, 'import_guru'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.import');

//route jurusan
Route::get('data-kelas',[JurusanController::class,'index'])->middleware(['auth', 'verified', 'role:admin'])->name('data-kelas');
Route::post('/input',[JurusanController::class, 'store'])->middleware(['auth', 'verified', 'role:admin'])->name('data-kelas.input');
Route::put('/data-kelas/update/{id}',[JurusanController::class, 'update'])->middleware(['auth', 'verified', 'role:admin'])->name('data-kelas.update');
Route::delete('/data-kelas/hapus/{id}', [JurusanController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin'])->name('data-kelas.hapus');

// mapel
Route::get('mapel',[MapelController::class, 'mapel'])->middleware(['auth', 'verified', 'role:admin'])->name('mapel');
Route::get('mapel/tambah',[MapelController::class, 'create'])->middleware(['auth', 'verified', 'role:admin'])->name('tambah-mapel');
Route::post('mapelInput',[MapelController::class, 'store'])->middleware(['auth', 'verified', 'role:admin'])->name('mapel.input');
Route::put('/mapel/update/{id}',[MapelController::class, 'update'])->middleware(['auth', 'verified', 'role:admin'])->name('mapel.update');
Route::delete('/mapel/hapus/{id}',[MapelController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin'])->name('mapel.hapus');


route::get('data-karir',[DataKarirController::class, 'show'])->middleware(['auth', 'verified'])->name('karir');
route::put('data-karir/update/{id}',[DataKarirController::class, 'update'])->name('karir.update');


Route::get('users',[UserController::class,'users'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users');
// Route::get('users/tambah',[UserController::class,'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah_users');
// Route::post('/users/tambah',[UserController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.input');
Route::get('users/edit/{id}',[UserController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.edit');
Route::put('users/update/{id}',[UserController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.update');
Route::delete('/users/hapus/{id}',[UserController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.hapus');


// Route untuk halaman 404
Route::fallback(function () {
    return view('errors.404-color',[
        'title' => 'Not Found!',
    ]);
});

require __DIR__.'/auth.php';
