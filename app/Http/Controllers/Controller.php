<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
    public function dataNilai()
    {   
        return view('data_nilai',[
            'title' => 'Data Nilai Siswa'
        ]);
    }
    public function detailDataNilai()
    {   
        return view('detail_data_nilai',[
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
    public function DataSiswa()
    {   
        return view('student/datasiswa',[
            'title' => 'Data Siswa'
        ]);
    }
    public function addDataSiswa()
    {   
        return view('student/datasiswa_add',[
            'title' => 'Tambah Data Siswa'
        ]);
    }
    public function editDataSiswa()
    {   
        return view('student/datasiswa_update',
        [
            'title' => 'Edit Data Siswa'
        ]);
    }
    public function dataGuru()
    {   
        return view('teacher/dataguru',
        [
            'title' => 'Data Guru'
        ]);
    }
}
