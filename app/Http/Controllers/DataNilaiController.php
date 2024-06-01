<?php

namespace App\Http\Controllers;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataNilaiController extends Controller
{
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


        $semesters = ["S1", "S2", "S3", "S4", "S5","S6"];

        $rata_rata_semester = [];
        
        foreach ($semesters as $semester) {
            $rata_rata = Nilai::where('nisn', $nisn)
                ->where('semester', $semester)
                ->avg('nilai');
             // Jika nilai rata-rata adalah 0.00, ganti dengan NaN
            $rata_rata_formatted = ($rata_rata == 0.00) ? "NaN" : number_format($rata_rata, 2);
            $rata_rata_semester[$semester] = $rata_rata_formatted;
        }
        
        return view('nilai.data_nilai',[
            'nisn' => $nisn,
            'title' => 'Data Nilai Siswa',
            'rata_rata_semester' => $rata_rata_semester,
            'data' => $data,
            'kelas' => $kelas,
        ]);
    }
    public function inputNilai1()
    {   
        $mapel = MataPelajaran::all();
        return view('nilai.add_nilai1',[
            'title' => 'Input Data Nilai Semester 1',
            'mata_pelajaran' => $mapel,
        ]);
    }
    public function inputNilai2()
    {   
        $mapel = MataPelajaran::all();
        return view('nilai.add_nilai2',[
            'title' => 'Input Data Nilai Semester 2',
            'mata_pelajaran' => $mapel,
        ]);
    }
    public function inputNilai3()
    {   
        $mapel = MataPelajaran::all();
        return view('nilai.add_nilai3',[
            'title' => 'Input Data Nilai Semester 3',
            'mata_pelajaran' => $mapel,
        ]);
    }
    public function inputNilai4()
    {   
        $mapel = MataPelajaran::all();
        return view('nilai.add_nilai4',[
            'title' => 'Input Data Nilai Semester 4',
            'mata_pelajaran' => $mapel,

        ]);
    }
    public function inputNilai5()
    {   
        $mapel = MataPelajaran::all();
        return view('nilai.add_nilai5',[
            'title' => 'Input Data Nilai Semester 5',
            'mata_pelajaran' => $mapel,
        ]);
    }
    public function inputNilai6()
    {   
        $mapel = MataPelajaran::all();
        return view('nilai.add_nilai6',[
            'title' => 'Input Data Nilai Semester 6',
            'mata_pelajaran' => $mapel,
        ]);
    }
    public function detailDataNilai1()
    {   
   
    $nisn = Auth::user()->nisn;
    
    // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
    $nilaiS1 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status')
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
        return view('nilai.detail_data_nilai1',[
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
        return view('nilai.detail_data_nilai2',[
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
        return view('nilai.detail_data_nilai3',[
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
        return view('nilai.detail_data_nilai4',[
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
        return view('nilai.detail_data_nilai5',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS5' => $nilaiS5,
        'statusakhir'=> $statusAkhir
    ]);
    }
    public function detailDataNilai6()
    {   
        $nisn = Auth::user()->nisn;
        
        // Mengambil semua data nilai dengan nisn yang sama dengan pengguna yang login dan semester 'S1'
        $nilaiS6 = Nilai::where('nisn', $nisn)
        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran', '=', 'nilai.mata_pelajaran')
        ->select('nilai.nisn', 'nilai.semester','mata_pelajaran.nama_mata_pelajaran', 'nilai.mata_pelajaran','nilai.nilai','nilai.status', )
        ->where('semester', 'S6')
        ->get();

        $status = $nilaiS6->pluck('status');
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
        return view('nilai.detail_data_nilai6',[
        'title' => 'Detail Data Nilai Siswa',
        'nilaiS6' => $nilaiS6,
        'statusakhir'=> $statusAkhir
    ]);
    }

    //semester 1
    public function store1(Request $request)
    {
        $mata_pelajaran = MataPelajaran::all();
        $nisn = Auth::user()->nisn;
        $semester = "S1";
    
        // Ambil semua input dari form
        $input_data = $request->all();
    
        // Bangun aturan validasi dinamis
        $validation_rules = [];
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $validation_rules[$input_field] = 'required|integer';

            $validation_messages["{$input_field}.required"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} wajib diisi.";
            $validation_messages["{$input_field}.integer"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} harus berupa angka.";
        }
    
        // Lakukan validasi
        $request->validate($validation_rules,$validation_messages);
    
        // Loop melalui semua mata pelajaran dan simpan nilai
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $nilai = $input_data[$input_field];
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mapel->id_mata_pelajaran)
                                  ->first();
    
            // Jika data sudah ada, perbarui nilainya
            if ($existing_data) {
                $existing_data->update([
                    'semester' => $semester,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            } else {
                // Jika tidak, buat data baru
                Nilai::create([
                    'nisn' => $nisn,
                    'semester' => $semester,
                    'mata_pelajaran' => $mapel->id_mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    public function store2(Request $request)
    {
        $mata_pelajaran = MataPelajaran::all();
        $nisn = Auth::user()->nisn;
        $semester = "S2";
    
        // Ambil semua input dari form
        $input_data = $request->all();
    
        // Bangun aturan validasi dinamis
        $validation_rules = [];
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $validation_rules[$input_field] = 'required|integer';

            $validation_messages["{$input_field}.required"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} wajib diisi.";
            $validation_messages["{$input_field}.integer"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} harus berupa angka.";
        }
    
        // Lakukan validasi
        $request->validate($validation_rules,$validation_messages);
    
        // Loop melalui semua mata pelajaran dan simpan nilai
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $nilai = $input_data[$input_field];
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mapel->id_mata_pelajaran)
                                  ->first();
    
            // Jika data sudah ada, perbarui nilainya
            if ($existing_data) {
                $existing_data->update([
                    'semester' => $semester,
                    'nilai' => $nilai,
                    'status' => 'Pending',
                ]);
            } else {
                // Jika tidak, buat data baru
                Nilai::create([
                    'nisn' => $nisn,
                    'semester' => $semester,
                    'mata_pelajaran' => $mapel->id_mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    public function store3(Request $request)
    {
        $mata_pelajaran = MataPelajaran::all();
        $nisn = Auth::user()->nisn;
        $semester = "S3";
    
        // Ambil semua input dari form
        $input_data = $request->all();
    
        // Bangun aturan validasi dinamis
        $validation_rules = [];
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $validation_rules[$input_field] = 'required|integer';

            $validation_messages["{$input_field}.required"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} wajib diisi.";
            $validation_messages["{$input_field}.integer"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} harus berupa angka.";
        }
    
        // Lakukan validasi
        $request->validate($validation_rules,$validation_messages);
    
        // Loop melalui semua mata pelajaran dan simpan nilai
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $nilai = $input_data[$input_field];
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mapel->id_mata_pelajaran)
                                  ->first();
    
            // Jika data sudah ada, perbarui nilainya
            if ($existing_data) {
                $existing_data->update([
                    'semester' => $semester,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            } else {
                // Jika tidak, buat data baru
                Nilai::create([
                    'nisn' => $nisn,
                    'semester' => $semester,
                    'mata_pelajaran' => $mapel->id_mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    public function store4(Request $request)
    {
        $mata_pelajaran = MataPelajaran::all();
        $nisn = Auth::user()->nisn;
        $semester = "S4";
    
        // Ambil semua input dari form
        $input_data = $request->all();
    
        // Bangun aturan validasi dinamis
        $validation_rules = [];
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $validation_rules[$input_field] = 'required|integer';

            $validation_messages["{$input_field}.required"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} wajib diisi.";
            $validation_messages["{$input_field}.integer"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} harus berupa angka.";
        }
    
        // Lakukan validasi
        $request->validate($validation_rules,$validation_messages);
    
        // Loop melalui semua mata pelajaran dan simpan nilai
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $nilai = $input_data[$input_field];
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mapel->id_mata_pelajaran)
                                  ->first();
    
            // Jika data sudah ada, perbarui nilainya
            if ($existing_data) {
                $existing_data->update([
                    'semester' => $semester,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            } else {
                // Jika tidak, buat data baru
                Nilai::create([
                    'nisn' => $nisn,
                    'semester' => $semester,
                    'mata_pelajaran' => $mapel->id_mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    public function store5(Request $request)
    {
        $mata_pelajaran = MataPelajaran::all();
        $nisn = Auth::user()->nisn;
        $semester = "S5";
    
        // Ambil semua input dari form
        $input_data = $request->all();
    
        // Bangun aturan validasi dinamis
        $validation_rules = [];
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $validation_rules[$input_field] = 'required|integer';

            $validation_messages["{$input_field}.required"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} wajib diisi.";
            $validation_messages["{$input_field}.integer"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} harus berupa angka.";
        }
    
        // Lakukan validasi
        $request->validate($validation_rules,$validation_messages);
    
        // Loop melalui semua mata pelajaran dan simpan nilai
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $nilai = $input_data[$input_field];
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mapel->id_mata_pelajaran)
                                  ->first();
    
            // Jika data sudah ada, perbarui nilainya
            if ($existing_data) {
                $existing_data->update([
                    'semester' => $semester,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            } else {
                // Jika tidak, buat data baru
                Nilai::create([
                    'nisn' => $nisn,
                    'semester' => $semester,
                    'mata_pelajaran' => $mapel->id_mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    public function store6(Request $request)
    {
        $mata_pelajaran = MataPelajaran::all();
        $nisn = Auth::user()->nisn;
        $semester = "S6";
    
        // Ambil semua input dari form
        $input_data = $request->all();
    
        // Bangun aturan validasi dinamis
        $validation_rules = [];
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $validation_rules[$input_field] = 'required|integer';

            $validation_messages["{$input_field}.required"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} wajib diisi.";
            $validation_messages["{$input_field}.integer"] = "Nilai mata pelajaran {$mapel->nama_mata_pelajaran} harus berupa angka.";
        }
    
        // Lakukan validasi
        $request->validate($validation_rules,$validation_messages);
    
        // Loop melalui semua mata pelajaran dan simpan nilai
        foreach ($mata_pelajaran as $mapel) {
            $input_field = $mapel->id_mata_pelajaran;
            $nilai = $input_data[$input_field];
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mapel->id_mata_pelajaran)
                                  ->first();
    
            // Jika data sudah ada, perbarui nilainya
            if ($existing_data) {
                $existing_data->update([
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            } else {
                // Jika tidak, buat data baru
                Nilai::create([
                    'nisn' => $nisn,
                    'semester' => $semester,
                    'mata_pelajaran' => $mapel->id_mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }
        

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
    public function verifikasiGuru(){
        // ambil nip
        $guru = Auth::user()->nip;
        $data_profile = Guru::select()->where('nip', $guru)->first();
        // ambil kelas first untuk tidak mengulang hanya cari satu data
        $kelas = Guru::select('walikelas','mata_pelajaran','jurusan','urutan_kelas')->where('nip', $guru)->first();

        $data = User::join('nilai', 'users.nisn', '=', 'nilai.nisn')
                ->join('siswa', 'users.nisn', '=', 'siswa.nisn')
                ->select('users.nisn', 'users.name', 'siswa.jenis_kelamin', 'siswa.image', 'siswa.kelas','siswa.jurusan','siswa.urutan_kelas', 'nilai.status', Siswa::raw('MAX(nilai.created_at) as last_created_at'))
                ->groupBy('users.nisn', 'users.name', 'siswa.image', 'siswa.kelas','siswa.jurusan','siswa.urutan_kelas', 'nilai.status')
                ->where('nilai.status', 'Pending')
                ->where('siswa.kelas', $kelas->walikelas)
                ->where('siswa.jurusan', $kelas->jurusan)
                ->where('siswa.urutan_kelas', $kelas->urutan_kelas)
                ->orderBy('last_created_at','desc')
                ->get();

        return view('nilai.data_nilai_guru',[
            'title' => 'Verifikasi Nilai',
            'data' => $data,
            'data_profile' => $data_profile,
        ]);
    }
    public function verifikasiGuruDetail($nisn){
        $nisn_siswa = $nisn;
        $semester1 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->Leftjoin('mata_pelajaran','nilai.mata_pelajaran','=','mata_pelajaran.id_mata_pelajaran')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'mata_pelajaran.nama_mata_pelajaran as mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S1')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester2 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->Leftjoin('mata_pelajaran','nilai.mata_pelajaran','=','mata_pelajaran.id_mata_pelajaran')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'mata_pelajaran.nama_mata_pelajaran as mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S2')
        ->where('nilai.status', 'Pending')
        ->get();


        $semester3 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->Leftjoin('mata_pelajaran','nilai.mata_pelajaran','=','mata_pelajaran.id_mata_pelajaran')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'mata_pelajaran.nama_mata_pelajaran as mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S3')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester4 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->Leftjoin('mata_pelajaran','nilai.mata_pelajaran','=','mata_pelajaran.id_mata_pelajaran')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'mata_pelajaran.nama_mata_pelajaran as mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S4')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester5 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->Leftjoin('mata_pelajaran','nilai.mata_pelajaran','=','mata_pelajaran.id_mata_pelajaran')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'mata_pelajaran.nama_mata_pelajaran as mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S5')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester6 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->Leftjoin('mata_pelajaran','nilai.mata_pelajaran','=','mata_pelajaran.id_mata_pelajaran')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'mata_pelajaran.nama_mata_pelajaran as mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S6')
        ->where('nilai.status', 'Pending')
        ->get();
        
        return view('nilai.data_nilai_verifikasi',[
            'title' => 'Verifikasi Nilai',
            'nisn_siswa' => $nisn_siswa,
            'semester' => 'S1',
            'semester1' => $semester1,
            'semester2' => $semester2,
            'semester3' => $semester3,
            'semester4' => $semester4,
            'semester5' => $semester5,
            'semester6' => $semester6,
        ]);
    }
    public function tolakNilai(Request $request, string $nisn, string $id){

        $nilai = Nilai::where('nisn', $nisn)->where('id', $id)->firstOrFail();
        $nilai->update([
            'status' => $request->status,
        ]);
        
        if($nilai->update()){
            return redirect()->back()->with(['success-tolak' => 'Data Nilai Berhasil Ditolak!']);
        } else{
            return redirect()->back()->with(['fail' => 'Data Nilai Tidak Berhasil Ditolak!']);
        }
    }
    public function terimaNilai(Request $request, string $nisn, string $id){
        $nilai = Nilai::where('nisn', $nisn)->where('id', $id)->firstOrFail();
        $nilai->update([
            'status' => $request->status,
        ]);

        if($nilai->update()){
            return redirect()->back()->with(['success-acc' => 'Data Nilai Berhasil Diverifikasi!']);
        } else{
            return redirect()->back()->with(['fail' => 'Data Nilai Tidak Berhasil Diverifikasi!']);
        }
    }
    public function tolakNilaiSemua(Request $request, string $nisn, string $semester){
        $nilai = Nilai::where('nisn', $nisn)
        ->where('semester', $semester)
        ->update(['status' => $request->status]);

        if($nilai > 0){
            return redirect()->back()->with(['success-tolak' => 'Data Nilai Berhasil Ditolak!']);
        } else{
            return redirect()->back()->with(['fail' => 'Data Nilai Tidak Berhasil Ditolak!']);
        }
    }
    public function TerimaNilaiSemua(Request $request, string $nisn,string $semester){
        $nilai = Nilai::where('nisn', $nisn)
        ->where('semester', $semester)
        ->update(['status' => $request->status]);
        
        if($nilai > 0){
            return redirect()->back()->with(['success-acc' => 'Data Nilai Berhasil Diverifikasi!']);
        } else{
            return redirect()->back()->with(['fail' => 'Data Nilai Tidak Berhasil Ditolak!']);
        }
    }
}
