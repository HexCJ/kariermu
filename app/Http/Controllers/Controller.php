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
        $kelas = Siswa::select('kelas')->where('nisn',$nisn)->first();

        $data = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->join('semester', 'semester.id_semester', '=', 'nilai.semester')
        ->select('siswa.nisn', 'semester.semester_ke', 'nilai.semester', Nilai::raw('GROUP_CONCAT(nilai.status) as statuses'))
        ->groupBy('siswa.nisn', 'semester.semester_ke', 'nilai.semester')
        ->where('siswa.nisn', $nisn)
        ->get();

        // $id = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        // ->join('semester', 'semester.id_semester', '=', 'nilai.semester')
        // ->select('nilai.id')
        // ->groupBy('nilai.id')
        // ->where('siswa.nisn', $nisn)
        // ->get();

        // $id = Nilai::findOrFail($id);


        $semesters = ["S1", "S2", "S3", "S4", "S5"];

        $rata_rata_semester = [];
        
        foreach ($semesters as $semester) {
            $rata_rata = Nilai::where('nisn', $nisn)
                ->where('semester', $semester)
                ->avg('nilai');
             // Jika nilai rata-rata adalah 0.00, ganti dengan NaN
            $rata_rata_formatted = ($rata_rata == 0.00) ? "NaN" : number_format($rata_rata, 2);
            $rata_rata_semester[$semester] = $rata_rata_formatted;
        }
        
        return view('nilai/data_nilai',[
            'nisn' => $nisn,
            'title' => 'Data Nilai Siswa',
            'rata_rata_semester' => $rata_rata_semester,
            'data' => $data,
            'kelas' => $kelas,
            // 'id' => $id
        ]);
    }

    public function detailDataNilai1()
    {   
   
    $nisn = Auth::user()->nisn;
    
    // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
    $nilaiS1 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status', )
        ->where('semester', 'S1')
        ->get();

        $status = $nilaiS1->pluck('status');
        // Memeriksa apakah ada yang "Tidak Terverifikasi"
        if ($status->contains('Tidak Terverifikasi')) {
            $statusAkhir = 'Tidak Terverifikasi';
        } 
        // Memeriksa apakah ada yang "Pending"
        elseif ($status->contains('Pending')  && !$status->contains('Tidak Terverifikasi')) {
            $statusAkhir = 'Pending';
        } 
        // Memeriksa apakah semua "Terverifikasi"
        elseif ($status->contains('Terverifikasi') && !$status->contains('Tidak Terverifikasi')  && !$status->contains('Pending')) {
            $statusAkhir = 'Terverifikasi';
        } 
        // Jika tidak ada yang tidak terverifikasi, pending, atau terverifikasi
        else {
            $statusAkhir = null; // Atau sesuai kebutuhan Anda
        }       
        
        return view('nilai/detail_data_nilai1',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS1' => $nilaiS1,
        'statusakhir' => $statusAkhir
    ]);
    }
    public function detailDataNilai2()
    {   
    $nisn = Auth::user()->nisn;
    
    // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
    $nilaiS2 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status', )
        ->where('semester', 'S2')
        ->get();

    $status = $nilaiS2->pluck('status');
    // Memeriksa apakah ada yang "Tidak Terverifikasi"
    if ($status->contains('Tidak Terverifikasi')) {
        $statusAkhir = 'Tidak Terverifikasi';
    } 
    // Memeriksa apakah ada yang "Pending"
    elseif ($status->contains('Pending')  && !$status->contains('Tidak Terverifikasi')) {
        $statusAkhir = 'Pending';
    } 
    // Memeriksa apakah semua "Terverifikasi"
    elseif ($status->contains('Terverifikasi') && !$status->contains('Tidak Terverifikasi')  && !$status->contains('Pending')) {
        $statusAkhir = 'Terverifikasi';
    } 
    // Jika tidak ada yang tidak terverifikasi, pending, atau terverifikasi
    else {
        $statusAkhir = null; // Atau sesuai kebutuhan Anda
    }       
        return view('nilai/detail_data_nilai2',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS2' => $nilaiS2,
        'statusakhir'=> $statusAkhir
    ]);
    }
    public function detailDataNilai3()
    {   
   
    $nisn = Auth::user()->nisn;
    
    // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
    $nilaiS3 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status', )
        ->where('semester', 'S3')
        ->get();  

    $status = $nilaiS3->pluck('status');
    // Memeriksa apakah ada yang "Tidak Terverifikasi"
    if ($status->contains('Tidak Terverifikasi')) {
        $statusAkhir = 'Tidak Terverifikasi';
    } 
    // Memeriksa apakah ada yang "Pending"
    elseif ($status->contains('Pending')  && !$status->contains('Tidak Terverifikasi')) {
        $statusAkhir = 'Pending';
    } 
    // Memeriksa apakah semua "Terverifikasi"
    elseif ($status->contains('Terverifikasi') && !$status->contains('Tidak Terverifikasi')  && !$status->contains('Pending')) {
        $statusAkhir = 'Terverifikasi';
    } 
    // Jika tidak ada yang tidak terverifikasi, pending, atau terverifikasi
    else {
        $statusAkhir = null; // Atau sesuai kebutuhan Anda
    }     
        return view('nilai/detail_data_nilai3',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS3' => $nilaiS3,
        'statusakhir'=> $statusAkhir
    ]);
    }
    public function detailDataNilai4()
    {   
   
    $nisn = Auth::user()->nisn;
    
    // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
    $nilaiS4 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status', )
        ->where('semester', 'S4')
        ->get();
        
    $status = $nilaiS4->pluck('status');
    // Memeriksa apakah ada yang "Tidak Terverifikasi"
    if ($status->contains('Tidak Terverifikasi')) {
        $statusAkhir = 'Tidak Terverifikasi';
    } 
    // Memeriksa apakah ada yang "Pending"
    elseif ($status->contains('Pending')  && !$status->contains('Tidak Terverifikasi')) {
        $statusAkhir = 'Pending';
    } 
    // Memeriksa apakah semua "Terverifikasi"
    elseif ($status->contains('Terverifikasi') && !$status->contains('Tidak Terverifikasi')  && !$status->contains('Pending')) {
        $statusAkhir = 'Terverifikasi';
    } 
    // Jika tidak ada yang tidak terverifikasi, pending, atau terverifikasi
    else {
        $statusAkhir = null; // Atau sesuai kebutuhan Anda
    }     
        return view('nilai/detail_data_nilai4',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS4' => $nilaiS4,
        'statusakhir'=> $statusAkhir
    ]);
    }
    public function detailDataNilai5()
    {   
        $nisn = Auth::user()->nisn;
        
        // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
        $nilaiS5 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status', )
        ->where('semester', 'S5')
        ->get();

        $status = $nilaiS5->pluck('status');
        // Memeriksa apakah ada yang "Tidak Terverifikasi"
        if ($status->contains('Tidak Terverifikasi')) {
            $statusAkhir = 'Tidak Terverifikasi';
        } 
        // Memeriksa apakah ada yang "Pending"
        elseif ($status->contains('Pending')  && !$status->contains('Tidak Terverifikasi')) {
            $statusAkhir = 'Pending';
        } 
        // Memeriksa apakah semua "Terverifikasi"
        elseif ($status->contains('Terverifikasi') && !$status->contains('Tidak Terverifikasi')  && !$status->contains('Pending')) {
            $statusAkhir = 'Terverifikasi';
        } 
        // Jika tidak ada yang tidak terverifikasi, pending, atau terverifikasi
        else {
            $statusAkhir = null; // Atau sesuai kebutuhan Anda
        }     
        return view('nilai/detail_data_nilai5',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS5' => $nilaiS5,
        'statusakhir'=> $statusAkhir
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
