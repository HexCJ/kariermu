<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\serverSide;
use App\Http\Controllers\SiswaController;
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
Route::get('/dashboard',[Controller::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/profile',[ProfileController::class,'index'])->middleware(['auth', 'verified'])->name('profile');
Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth')->name('profile');


// nilai
Route::get('/nilai',[Controller::class,'dataNilai'])->name('datanilai');
Route::get('/nilai/detail_nilai',[Controller::class,'detailDataNilai']);

Route::get('detail_status',[Controller::class, 'detailStatus'])->name('detail.status');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// end


//routing dan memberi izin kepada role
Route::get('admin',[Controller::class,'dashboardAdmin'])->middleware(['auth', 'verified', 'role:admin']);


// data guru
Route::get('guru',[GuruController::class,'index'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('guru');
Route::get('guru/tambah',[GuruController::class,'create'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('tambah_guru');


Route::get('tulisan',function(){
    return view('tulisan');
})->middleware(['auth', 'verified', 'role_or_permission:lihat-tulisan|admin']);

Route::get('penulis',function(){
    return view('tulisan');
})->middleware(['auth', 'verified', 'role:penulis|admin']);
require __DIR__.'/auth.php';



Route::get('siswa',[SiswaController::class,'index'])->middleware(['auth', 'verified', 'role:penulis|admin|siswa'])->name('siswa');
Route::get('siswa/tambah',[SiswaController::class,'create'])->middleware(['auth', 'verified', 'role:admin|siswa'])->name('tambah_siswa');
//route input siswa
Route::post('/siswa/tambah',[SiswaController::class, 'store'])->name('user.input');
//route edit siswa  
Route::get('siswa/edit/{id}',[SiswaController::class, 'edit'])->name('user.edit');
Route::put('siswa/update/{id}',[SiswaController::class, 'update'])->name('user.update');
//route hapus siswa
Route::delete('/siswa/hapus/{id}',[SiswaController::class, 'destroy'])->name('siswa.hapus');


// route guru
Route::get('guru',[GuruController::class,'index'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('guru');
Route::get('guru/tambah',[GuruController::class,'create'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('tambah_guru');
//route input guru
Route::post('/inputGuru',[GuruController::class, 'store'])->name('guru.input');
//route edit guru
Route::get('guru/edit/{id}',[GuruController::class, 'edit'])->name('guru.edit');
Route::put('guru/update/{id}',[GuruController::class, 'update'])->name('guru.update');
//route hapus guru
Route::delete('/guru/hapus/{id}',[GuruController::class, 'destroy'])->name('guru.hapus');

// //edit
// Route::get('data-kelas/edit/{id}',[JurusanController::class, 'edit'])->name('data-kelas.edit');
// Route::put('data-kelas/update/{id}',[JurusanController::class, 'update'])->name('data-kelas.update');
//route hapus guru

//route jurusan
Route::get('data-kelas',[JurusanController::class,'index'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('data-kelas');
Route::post('/input',[JurusanController::class, 'store'])->name('data-kelas.input');
Route::delete('/data-kelas/hapus/{id}', [JurusanController::class, 'destroy'])->name('data-kelas.hapus');







