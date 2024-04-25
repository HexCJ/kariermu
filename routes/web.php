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
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');
Route::put('/profile/updateprofile/{id}', [ProfileController::class, 'profilefoto'])->middleware('auth')->name('profile.foto');
Route::put('/profile/updateprofile-guru/{id}', [ProfileController::class, 'profilefotoguru'])->middleware('auth')->name('profile.foto-guru');
Route::put('/profile/updateprofile-admin/{id}', [ProfileController::class, 'profilefotoadmin'])->middleware('auth')->name('profile.foto-admin');
// Route::get('profile/edit/{nisn}',[ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');
Route::put('profile/updatesiswa/{id}', [ProfileController::class, 'updatesiswa'])->middleware(['auth'])->name('profile.updatesiswa');
Route::put('profile/updateguru/{id}', [ProfileController::class, 'updateguru'])->middleware(['auth'])->name('profile.updateguru');
Route::put('profile/updateadmin/{id}', [ProfileController::class, 'updateadmin'])->middleware(['auth'])->name('profile.updateadmin');

// nilai
Route::get('/nilai',[Controller::class,'dataNilai'])->name('datanilai');
Route::get('/nilai/detail_nilai',[Controller::class,'detailDataNilai']);
Route::get('/nilai/add_nilai',[Controller::class,'inputNilai']);

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('detail_status/menganggur',[DashboardController::class, 'detailStatusTidakKerja'])->middleware(['auth'])->name('detail.tidakkerja');
Route::get('detail_status/kerja',[DashboardController::class, 'detailStatusKerja'])->middleware(['auth', 'verified'])->name('detail.kerja');
Route::get('detail_status/kuliah',[DashboardController::class, 'detailStatusKuliah'])->middleware(['auth', 'verified'])->name('detail.kuliah');
Route::get('detail_status/wirausaha',[DashboardController::class, 'detailStatusWira'])->middleware(['auth', 'verified'])->name('detail.wirausaha');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// end


//routing dan memberi izin kepada role
Route::get('admin',[Controller::class,'dashboardAdmin'])->middleware(['auth', 'verified', 'role:admin']);


// data guru
Route::get('guru',[GuruController::class,'index'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru');
Route::get('guru/tambah',[GuruController::class,'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah_guru');


Route::get('tulisan',function(){
    return view('tulisan');
})->middleware(['auth', 'verified', 'role_or_permission:lihat-tulisan|admin']);

Route::get('penulis',function(){
    return view('tulisan');
})->middleware(['auth', 'verified', 'role:penulis|admin']);
require __DIR__.'/auth.php';

// Route Admin
Route::get('admin',[AdminController::class,'admin'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin');
Route::get('admin/edit/{id}',[AdminController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.edit');
Route::put('admin/update/{id}',[AdminController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.update');
Route::delete('/admin/hapus/{id}',[AdminController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('admin.hapus');


// Route::get('siswa',[SiswaController::class,'index'])->middleware(['auth', 'verified', 'role:penulis|admin|siswa'])->name('siswa');
Route::get('siswa',[SiswaController::class,'siswa'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa');
// Route::get('siswa/tambah',[SiswaController::class,'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah_siswa');
//route input siswa
// Route::post('/siswa/tambah',[SiswaController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('user.input');
//route edit siswa  
Route::get('siswa/edit/{id}',[SiswaController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('user.edit');
Route::put('siswa/update/{id}',[SiswaController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('user.update');
//route hapus siswa
Route::delete('/siswa/hapus/{id}',[SiswaController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('siswa.hapus');


// route guru
Route::get('guru',[GuruController::class,'guru'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru');
// Route::get('guru/tambah',[GuruController::class,'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah_guru');
//route input guru
// Route::post('/inputGuru',[GuruController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.input');
//route edit guru
Route::get('guru/edit/{id}',[GuruController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.edit');
Route::put('guru/update/{id}',[GuruController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.update');
//route hapus guru
Route::delete('/guru/hapus/{id}',[GuruController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('guru.hapus');

//route jurusan
Route::get('data-kelas',[JurusanController::class,'index'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('data-kelas');
Route::post('/input',[JurusanController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('data-kelas.input');
Route::put('/data-kelas/update/{id}',[JurusanController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('data-kelas.update');
Route::delete('/data-kelas/hapus/{id}', [JurusanController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('data-kelas.hapus');

// mapel
Route::get('mapel',[MapelController::class, 'mapel'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('mapel');
Route::get('mapel/tambah',[MapelController::class, 'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah-mapel');
Route::post('mapelInput',[MapelController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('mapel.input');
Route::put('/mapel/update/{id}',[MapelController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('mapel.update');
Route::delete('/mapel/hapus/{id}',[MapelController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('mapel.hapus');


route::get('data-karir',[DataKarirController::class, 'show'])->name('karir');
route::put('data-karir/update/{id}',[DataKarirController::class, 'update'])->name('karir.update');


// Route::get('siswa',[SiswaController::class,'index'])->middleware(['auth', 'verified', 'role:penulis|admin|siswa'])->name('siswa');
Route::get('users',[UserController::class,'users'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users');
Route::get('users/tambah',[UserController::class,'create'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('tambah_users');
//route input users
Route::post('/users/tambah',[UserController::class, 'store'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.input');
//route edit users  
Route::get('users/edit/{id}',[UserController::class, 'edit'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.edit');

Route::put('users/update/{id}',[UserController::class, 'update'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.update');
//route hapus users
Route::delete('/users/hapus/{id}',[UserController::class, 'destroy'])->middleware(['auth', 'verified', 'role:admin|guru'])->name('users.hapus');



// Route untuk halaman 404
Route::fallback(function () {
    return view('errors.404',[
        'title' => '404',
    ]);
});

