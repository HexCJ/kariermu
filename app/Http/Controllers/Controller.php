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
        return view('dashboard',[
            'title' => 'Dashboard'
        ]);
    }
    // public function profile()
    // {   
    //     return view('data-profile',[
    //         'title' => 'Data Profile'
    //     ]);
    // }

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

    // public function DataSiswa()
    // {   
    //     //tampilin data
    //     $data = User::get();
    //     return view('student/datasiswa',compact('data'),[
    //         'title' => 'Data Siswa',
    //         'status_proses' => 'success',
    //         'message' => 'Data Berhasil Ditambahkan',
    //     ]);
    // }
    // public function addDataSiswa()
    // {   
    //     $jurusans = Jurusan::all();

    //     return view('student/datasiswa_add',[
    //         'title' => 'Tambah Data Siswa' ,
    //         'jurusans' => $jurusans 
    //     ]);
    // }
    // public function editDataSiswa($id)
    // {   
    // // Ambil data siswa berdasarkan ID
    // $data = User::findOrFail($id);

    // // Ambil data jurusan dari tabel jurusan
    // $jurusans = Jurusan::all();

    // return view('student/datasiswa_update',[
    //     'title' => 'Edit Data Siswa',
    //     'data' => $data,
    //     'jurusans' => $jurusans // Kirim data jurusan ke view
    // ]);
    // }
    // public function editDataSiswa()
    // {   
    //     return view('student/datasiswa_update',
    //     [
    //         'title' => 'Edit Data Siswa'
    //     ]);
    // }
    // public function dataGuru()
    // {   
    //     $data = Guru::get();
    //     return view('teacher/dataguru',compact('data'),
    //     [
    //         'title' => 'Data Guru'
    //     ]);
    // }
    // public function addDataGuru()
    // {   
    //     $matapelajarans = MataPelajaran::all();

    //     return view('teacher/dataguru_add',[
    //         'title' => 'Tambah Data Guru' ,
    //         'matapelajarans' => $matapelajarans 

    //     ]);
    // }
    // public function editDataGuru()
    // {   
    //     return view('teacher/dataguru_update',[
    //         'title' => 'Edit Data Guru' ,
    //     ]);
    // }
}
