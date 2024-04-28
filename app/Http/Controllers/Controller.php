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
use App\Models\Laporan;
use App\Models\Admin;
use App\Models\Nilai;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {   
        return view('index',[
            'title' => 'Login'
        ]);
    }

    // public function dataKelas()
    // {   
    //     $data = Jurusan::get();

    //     return view('data-kelas.data-kelas',compact('data'),[
    //         'title' => 'Data Jurusan'
    //     ]);
    // }

    // nilai
    // public function dataNilai()
    // {   
    //     $nisn = Auth::user()->nisn;
    //     $semester = "S1";
    //     $rata_rata = Nilai::where('nisn', $nisn)
    //     ->where('semester', $semester)->avg('nilai');
    //     return view('nilai/data_nilai',[
    //         'nisn' => $nisn,
    //         'title' => 'Input Data Nilai Siswa',
    //         'rata_rata' => $rata_rata        
    //     ]);
    // }
    public function dataNilai()
    {   
        $nisn = Auth::user()->nisn;
        
        $semesters = ["S1", "S2", "S3", "S4", "S5"];

        $rata_rata_semester = [];
        foreach ($semesters as $semester) {
            $rata_rata = Nilai::where('nisn', $nisn)
                ->where('semester', $semester)
                ->avg('nilai');
            $rata_rata_semester[$semester] = $rata_rata;
        }

        return view('nilai/data_nilai',[
            'nisn' => $nisn,
            'title' => 'Data Nilai Siswa',
            'rata_rata_semester' => $rata_rata_semester
        ]);
    }

    public function detailDataNilai()
    {   
        return view('nilai/detail_data_nilai',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function inputNilai1()
    {   
        return view('nilai/add_nilai1',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function inputNilai2()
    {   
        return view('nilai/add_nilai2',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function inputNilai3()
    {   
        return view('nilai/add_nilai3',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function inputNilai4()
    {   
        return view('nilai/add_nilai4',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function inputNilai5()
    {   
        return view('nilai/add_nilai5',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function dashboardAdmin()
    {   
        return view('dashboard', [
            'title' => 'Dashboard'
        ]);
    }


}
