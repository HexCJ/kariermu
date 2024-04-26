<?php

namespace App\Http\Controllers;

use App\Models\Jurusan; 
use App\Models\MataPelajaran; 
use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Laporan;
use App\Models\Admin;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {   
        $statusk = 'Bekerja';
        $statusm = 'Menganggur';
        $statuskl = 'Kuliah';
        $statusw = 'Wirausaha';
        $totalkerja = Laporan::where('status', $statusk)->count();
        $totalkuliah = Laporan::where('status', $statuskl)->count();
        $totalwirausaha = Laporan::where('status', $statusw)->count();
        $totaltkerja = Laporan::where('status', $statusm)->count();
        $user = Auth::user();
        // ambil nip dari user
        $nip = $user->nip;
    
        // jika nip ada/tidak kosong
        if (!empty($nip)) {
            // cari data guru berdasarkan nip
            $guru = Guru::where('nip', $nip)->first();
            // Jika data guru ketemu, balikin view dengan data guru
            if ($guru) {
                return view('dashboard', [
                    'guru' => $guru,
                    'totalkerja' => $totalkerja,
                    'totalkuliah' => $totalkuliah,
                    'totalwirausaha' => $totalwirausaha,
                    'totaltkerja' => $totaltkerja,
                    'title' => 'Dashboard'
                ]);
            }
        }
    
        // kalo gak ada guru, coba cari siswa berdasarkan nisn
        $nisn = $user->nisn;
        
        if (!empty($nisn)) {
            // Jika nisn ada, cari data siswa berdasarkan nisn
            $siswa = Siswa::where('nisn', $nisn)->first();
    
            // kalo data siswa ketemu, balik ke view dengan data siswa
            if ($siswa) {
                $jurusans = Jurusan::all();
                return view('dashboard', [
                    'siswa' => $siswa,
                    'jurusans' => $jurusans,
                    'title' => 'Dashboard'
                ]);
            }
        }
    
        // kalo kaga ketemu di siswa, coba cari admin berdasarkan id_admin
        $id_admin = $user->id_admin;
        if (!empty($id_admin)) {
            // Jika id_admin ada, cari data admin berdasarkan id_admin
            $admin = Admin::where('id_admin', $id_admin)->first();
    
            // kalo data admin ketemu, kembalikan view dengan data admin
            if ($admin) {
                return view('dashboard', [
                    'admin' => $admin,
                    'totalkerja' => $totalkerja,
                    'totalkuliah' => $totalkuliah,
                    'totalwirausaha' => $totalwirausaha,
                    'totaltkerja' => $totaltkerja,
                    'title' => 'Dashboard'
                ]);
            }
        }
    }

    public function detailStatusTidakKerja(Request $request)
    {
        $status = 'Menganggur';
        $query = Laporan::query()->where('status', $status);
        $jurusans = Jurusan::all();

        // Tampilkan data
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->input('jurusan'));
        }
        // Tampilkan data

        $data = $query->get();
    
        return view('status',[
            'title' => 'Detail Siswa Menganggur',
            'status' => $status,
            'data' => $data,
            'jurusans' => $jurusans,
        ]);;
    }
    public function detailStatusKerja(Request $request)
    {
        $status = 'Bekerja';
        $query = Laporan::query()->where('status', $status);
        $jurusans = Jurusan::all();
 
        // Tampilkan data
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->input('jurusan'));
        }
        // Tampilkan data

        $data = $query->get();
    
        return view('status',[
            'title' => 'Detail Siswa Bekerja',
            'status' => $status,
            'data' => $data,
            'jurusans' => $jurusans,
        ]);;
    }
    public function detailStatusKuliah(Request $request)
    {
        $status = 'Kuliah';
        $query = Laporan::query()->where('status', $status);
        $jurusans = Jurusan::all();

 
        // Tampilkan data
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->input('jurusan'));
        }
        // Tampilkan data

        $data = $query->get();
    
        return view('status',[
            'title' => 'Detail Siswa Berkuliah',
            'status' => $status,
            'data' => $data,
            'jurusans' => $jurusans,
        ]);;
    }
    public function detailStatusWira(Request $request)
    {
        $status = 'Wirausaha';
        $query = Laporan::query()->where('status', $status);
        $jurusans = Jurusan::all();

 
        // Tampilkan data
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->input('jurusan'));
        }
        // Tampilkan data

        $data = $query->get();
    
        return view('status',[
            'title' => 'Detail Siswa Wirausaha',
            'status' => $status,
            'data' => $data,
            'jurusans' => $jurusans,
        ]);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
