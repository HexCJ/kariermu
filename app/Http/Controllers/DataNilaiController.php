<?php

namespace App\Http\Controllers;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataNilaiController extends Controller
{
    public function detailDataNilai()
    {   
        return view('nilai/detail_data_nilai',[
            'title' => 'Detail Data Nilai Siswa'
        ]);
    }
    public function inputNilai()
    {   
        $nisn = Auth::user()->nisn;
        return view('nilai/add_nilai',[
            'nisn' => $nisn,
            'title' => 'Input Data Nilai Siswa'
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //semester 1
    public function store1(Request $request)
    {
        $nisn = Auth::user()->nisn;
        $semester = "S1";
    
        $data_nilai = [
            ['mata_pelajaran' => 'BI', 'request_field' => 'bindo'],
            ['mata_pelajaran' => 'MTK', 'request_field' => 'mtk'],
            ['mata_pelajaran' => 'BING', 'request_field' => 'bing'],
            ['mata_pelajaran' => 'PAI', 'request_field' => 'pai'],
            ['mata_pelajaran' => 'SI', 'request_field' => 'si'],
            ['mata_pelajaran' => 'IPAS', 'request_field' => 'ipas'],
            ['mata_pelajaran' => 'SB', 'request_field' => 'sb'],
            ['mata_pelajaran' => 'PKN', 'request_field' => 'pkn'],
            ['mata_pelajaran' => 'PJOK', 'request_field' => 'pjok'],
            ['mata_pelajaran' => 'KEJURUAN', 'request_field' => 'kejuruan']
        ];
    
        foreach ($data_nilai as $data) {
            $input_field = $data['request_field'];
            $mata_pelajaran = $data['mata_pelajaran'];
            $nilai = $request->$input_field;
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mata_pelajaran)
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
                    'mata_pelajaran' => $mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    
    //semester 2
    public function store2(Request $request)
    {
        $nisn = Auth::user()->nisn;
        $semester = "S2";
    
        $data_nilai = [
            ['mata_pelajaran' => 'BI', 'request_field' => 'bindo'],
            ['mata_pelajaran' => 'MTK', 'request_field' => 'mtk'],
            ['mata_pelajaran' => 'BING', 'request_field' => 'bing'],
            ['mata_pelajaran' => 'PAI', 'request_field' => 'pai'],
            ['mata_pelajaran' => 'SI', 'request_field' => 'si'],
            ['mata_pelajaran' => 'IPAS', 'request_field' => 'ipas'],
            ['mata_pelajaran' => 'SB', 'request_field' => 'sb'],
            ['mata_pelajaran' => 'PKN', 'request_field' => 'pkn'],
            ['mata_pelajaran' => 'PJOK', 'request_field' => 'pjok'],
            ['mata_pelajaran' => 'KEJURUAN', 'request_field' => 'kejuruan']
        ];
    
        foreach ($data_nilai as $data) {
            $input_field = $data['request_field'];
            $mata_pelajaran = $data['mata_pelajaran'];
            $nilai = $request->$input_field;
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mata_pelajaran)
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
                    'mata_pelajaran' => $mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }

    //semester 3
    public function store3(Request $request)
    {
        $nisn = Auth::user()->nisn;
        $semester = "S3";
    
        $data_nilai = [
            ['mata_pelajaran' => 'BI', 'request_field' => 'bindo'],
            ['mata_pelajaran' => 'MTK', 'request_field' => 'mtk'],
            ['mata_pelajaran' => 'BING', 'request_field' => 'bing'],
            ['mata_pelajaran' => 'PAI', 'request_field' => 'pai'],
            ['mata_pelajaran' => 'SI', 'request_field' => 'si'],
            ['mata_pelajaran' => 'IPAS', 'request_field' => 'ipas'],
            ['mata_pelajaran' => 'SB', 'request_field' => 'sb'],
            ['mata_pelajaran' => 'PKN', 'request_field' => 'pkn'],
            ['mata_pelajaran' => 'PJOK', 'request_field' => 'pjok'],
            ['mata_pelajaran' => 'KEJURUAN', 'request_field' => 'kejuruan']
        ];
    
        foreach ($data_nilai as $data) {
            $input_field = $data['request_field'];
            $mata_pelajaran = $data['mata_pelajaran'];
            $nilai = $request->$input_field;
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mata_pelajaran)
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
                    'mata_pelajaran' => $mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }

    //semester 4
    public function store4(Request $request)
    {
        $nisn = Auth::user()->nisn;
        $semester = "S4";
    
        $data_nilai = [
            ['mata_pelajaran' => 'BI', 'request_field' => 'bindo'],
            ['mata_pelajaran' => 'MTK', 'request_field' => 'mtk'],
            ['mata_pelajaran' => 'BING', 'request_field' => 'bing'],
            ['mata_pelajaran' => 'PAI', 'request_field' => 'pai'],
            ['mata_pelajaran' => 'SI', 'request_field' => 'si'],
            ['mata_pelajaran' => 'IPAS', 'request_field' => 'ipas'],
            ['mata_pelajaran' => 'SB', 'request_field' => 'sb'],
            ['mata_pelajaran' => 'PKN', 'request_field' => 'pkn'],
            ['mata_pelajaran' => 'PJOK', 'request_field' => 'pjok'],
            ['mata_pelajaran' => 'KEJURUAN', 'request_field' => 'kejuruan']
        ];
    
        foreach ($data_nilai as $data) {
            $input_field = $data['request_field'];
            $mata_pelajaran = $data['mata_pelajaran'];
            $nilai = $request->$input_field;
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mata_pelajaran)
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
                    'mata_pelajaran' => $mata_pelajaran,
                    'nilai' => $nilai,
                    'status' => 'Pending'
                ]);
            }
        }
    
        return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
    }
    
    //semester 5
    public function store5(Request $request)
    {
        $nisn = Auth::user()->nisn;
        $semester = "S5";
    
        $data_nilai = [
            ['mata_pelajaran' => 'BI', 'request_field' => 'bindo'],
            ['mata_pelajaran' => 'MTK', 'request_field' => 'mtk'],
            ['mata_pelajaran' => 'BING', 'request_field' => 'bing'],
            ['mata_pelajaran' => 'PAI', 'request_field' => 'pai'],
            ['mata_pelajaran' => 'SI', 'request_field' => 'si'],
            ['mata_pelajaran' => 'IPAS', 'request_field' => 'ipas'],
            ['mata_pelajaran' => 'SB', 'request_field' => 'sb'],
            ['mata_pelajaran' => 'PKN', 'request_field' => 'pkn'],
            ['mata_pelajaran' => 'PJOK', 'request_field' => 'pjok'],
            ['mata_pelajaran' => 'KEJURUAN', 'request_field' => 'kejuruan']
        ];
    
        foreach ($data_nilai as $data) {
            $input_field = $data['request_field'];
            $mata_pelajaran = $data['mata_pelajaran'];
            $nilai = $request->$input_field;
    
            // Periksa apakah data dengan kriteria yang sama sudah ada dalam database
            $existing_data = Nilai::where('nisn', $nisn)
                                  ->where('semester', $semester)
                                  ->where('mata_pelajaran', $mata_pelajaran)
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
                    'mata_pelajaran' => $mata_pelajaran,
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
                ->select('users.nisn', 'users.name', 'siswa.kelas','siswa.jurusan','siswa.urutan_kelas', 'nilai.semester', 'nilai.status','nilai.created_at')
                ->groupBy('users.nisn', 'users.name', 'siswa.kelas','siswa.jurusan','siswa.urutan_kelas', 'nilai.semester', 'nilai.status','nilai.created_at')
                ->OrderBy('nilai.created_at')
                ->where('nilai.status', 'Pending')
                ->where('siswa.kelas', $kelas->walikelas)
                ->where('siswa.jurusan', $kelas->jurusan)
                ->where('siswa.urutan_kelas', $kelas->urutan_kelas)
                ->limit(1)
                ->get();

        return view('nilai.data_nilai_guru',[
            'title' => 'Verifikasi Nilai',
            'data' => $data,
            'data_profile' => $data_profile
        ]);
    }
    public function verifikasiGuruDetail($nisn){

        $semester1 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S1')
        ->where('nilai.status', 'Pending')
        ->get();

        $notif_semester1 = $semester1->count();
        if($notif_semester1 >99){
        }
        $notif_semester1 = '99+';

        $semester2 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S2')
        ->where('nilai.status', 'Pending')
        ->get();

        $notif_semester2 = $semester2->count();
        if($notif_semester2 >99){
            $notif_semester2 = '99+';
        }


        $semester3 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S3')
        ->where('nilai.status', 'Pending')
        ->get();

        $notif_semester3 = $semester3->count();
        if($notif_semester3 >99){
            $notif_semester3 = '99+';
        }

        $semester4 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S4')
        ->where('nilai.status', 'Pending')
        ->get();
        
        $notif_semester4 = $semester4->count();
        if($notif_semester4 >99){
            $notif_semester4 = '99+';
        }

        $semester5 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S5')
        ->where('nilai.status', 'Pending')
        ->get();

        $notif_semester5 = $semester5->count();
        if($notif_semester5 >99){
            $notif_semester5 = '99+';
        }

        
        return view('nilai.data_nilai_verifikasi',[
            'title' => 'Verifikasi Nilai',
            'semester1' => $semester1,
            'semester2' => $semester2,
            'semester3' => $semester3,
            'semester4' => $semester4,
            'semester5' => $semester5,
            'notif_semester1' => $notif_semester1,
            'notif_semester2' => $notif_semester2,
            'notif_semester3' => $notif_semester3,
            'notif_semester4' => $notif_semester4,
            'notif_semester5' => $notif_semester5,


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
}
