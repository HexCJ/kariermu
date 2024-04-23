<?php

namespace App\Http\Controllers;

//tampilin user
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
use App\Models\Admin;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {   
        return view('index',[
            'title' => 'Login'
        ]);
    }
    public function dashboard()
    {   
        // return view('dashboard',[
        //     'title' => 'Dashboard'
        // ]);
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
                    'title' => 'Dashboard'
                ]);
            }
        }
    }

    // public function dataKelas()
    // {   
    //     $data = Jurusan::get();

    //     return view('data-kelas.data-kelas',compact('data'),[
    //         'title' => 'Data Jurusan'
    //     ]);
    // }

    // nilai
    public function dataNilai()
    {   
        return view('nilai/data_nilai',[
            'title' => 'Data Nilai Siswa'
        ]);
    }
    public function detailDataNilai()
    {   
        return view('nilai/detail_data_nilai',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function detailStatus()
    {   
        return view('status',[
            'title' => 'Detail Siswa'
        ]);
    }
    public function dashboardAdmin()
    {   
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }


}
