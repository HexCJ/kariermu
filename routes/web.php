<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
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

Route::get('/profile',[Controller::class,'profile'])->middleware(['auth', 'verified'])->name('profile');


// nilai
Route::get('/nilai',[Controller::class,'dataNilai']);
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
Route::get('data-kelas',[Controller::class,'dataKelas'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('data-kelas');
Route::get('data-kelas/tambah',[Controller::class,'addDataKelas'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('add-datakelas');


Route::get('siswa',[Controller::class,'dataSiswa'])->middleware(['auth', 'verified', 'role:penulis|admin|siswa'])->name('siswa');
Route::get('siswa/tambah',[Controller::class,'addDataSiswa'])->middleware(['auth', 'verified', 'role:admin|siswa']);
Route::get('siswa/edit',[Controller::class,'editDataSiswa'])->middleware(['auth', 'verified', 'role:penulis|admin|siswa']);

// data guru
Route::get('guru',[Controller::class,'dataGuru'])->middleware(['auth', 'verified', 'role:penulis|admin|guru'])->name('guru');
Route::get('guru/tambah',[Controller::class,'addDataGuru'])->middleware(['auth', 'verified', 'role:penulis|admin|guru']);
Route::get('guru/edit',[Controller::class,'editDataGuru'])->middleware(['auth', 'verified', 'role:penulis|admin|guru']);


Route::get('tulisan',function(){
    return view('tulisan');
})->middleware(['auth', 'verified', 'role_or_permission:lihat-tulisan|admin']);

Route::get('penulis',function(){
    return view('tulisan');
})->middleware(['auth', 'verified', 'role:penulis|admin']);
require __DIR__.'/auth.php';


//route input siswa
Route::post('/input',[Controller::class, 'input'])->name('user.input');
//route edit siswa  
Route::get('siswa/edit/{id}',[Controller::class, 'edit'])->name('user.edit');
Route::put('siswa/update/{id}',[Controller::class, 'update'])->name('user.update');
//route hapus siswa
Route::delete('/siswa/hapus/{id}',[Controller::class, 'hapus'])->name('siswa.hapus');

//route input guru
Route::post('/inputGuru',[Controller::class, 'inputGuru'])->name('guru.input');




