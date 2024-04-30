<?php

namespace App\Http\Controllers;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function dataNilai()
    // {
    //     $nisn = Auth::user()->nisn;
    //     return view('nilai/data_nilai',[
    //         'title' => 'Data Nilai Siswa',
    //     ]);
    // }
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
        //
        // $nisn                   = Auth::user()->nisn;
        // $data['nisn']           = $nisn;
        // $data['semester']       = "S1";
        // $data['mata_pelajaran'] = "BI";
        // $data['nilai']          = $request->bindo;

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
            

            // simpen data jadi array buat disimpan ke database
             $data_to_store[] = [
                'nisn' => $nisn,
                'semester' => $semester,
                'mata_pelajaran' => $mata_pelajaran,
                'nilai' => $nilai,
                'status' => 'Pending'
            ];
        }

        // Simpan data ke db
        foreach ($data_to_store as $data) {
            // dd($request->all());
            Nilai::create($data);
        }

        // $rata_rata = Nilai::where('nisn', $nisn)
        // ->where('semester', $semester)->avg('nilai');
        
        // return view('nilai/data_nilai',[
        //     'nisn' => $nisn,
        //     'title' => 'Input Data Nilai Siswa',
        //     'rata_rata' => $rata_rata
        // ]);
        if($nilai = Nilai::create($data)){
            return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
        }else{
            return redirect()->route('datanilai')->with('fail', 'Data Nilai gagal ditambahkan');
        }
    }

    //semester 2
    public function store2(Request $request)
    {
        //
        // $nisn                   = Auth::user()->nisn;
        // $data['nisn']           = $nisn;
        // $data['semester']       = "S1";
        // $data['mata_pelajaran'] = "BI";
        // $data['nilai']          = $request->bindo;

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
            

            // simpen data jadi array buat disimpan ke database
             $data_to_store[] = [
                'nisn' => $nisn,
                'semester' => $semester,
                'mata_pelajaran' => $mata_pelajaran,
                'nilai' => $nilai,
                'status' => 'Pending'
            ];
        }

        // Simpan data ke db
        foreach ($data_to_store as $data) {
            // dd($request->all());
            Nilai::create($data);
        }

        // $rata_rata = Nilai::where('nisn', $nisn)
        // ->where('semester', $semester)->avg('nilai');
        
        // return view('nilai/data_nilai',[
        //     'nisn' => $nisn,
        //     'title' => 'Input Data Nilai Siswa',
        //     'rata_rata' => $rata_rata
        // ]);
        if($nilai = Nilai::create($data)){
            return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
        }else{
            return redirect()->route('datanilai')->with('fail', 'Data Nilai gagal ditambahkan');
        }
    }

    //semester 3
    public function store3(Request $request)
    {
        //
        // $nisn                   = Auth::user()->nisn;
        // $data['nisn']           = $nisn;
        // $data['semester']       = "S1";
        // $data['mata_pelajaran'] = "BI";
        // $data['nilai']          = $request->bindo;

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
            

            // simpen data jadi array buat disimpan ke database
             $data_to_store[] = [
                'nisn' => $nisn,
                'semester' => $semester,
                'mata_pelajaran' => $mata_pelajaran,
                'nilai' => $nilai,
                'status' => 'Pending'
            ];
        }

        // Simpan data ke db
        foreach ($data_to_store as $data) {
            // dd($request->all());
            Nilai::create($data);
        }

        // $rata_rata = Nilai::where('nisn', $nisn)
        // ->where('semester', $semester)->avg('nilai');
        
        // return view('nilai/data_nilai',[
        //     'nisn' => $nisn,
        //     'title' => 'Input Data Nilai Siswa',
        //     'rata_rata' => $rata_rata
        // ]);
        if($nilai = Nilai::create($data)){
            return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
        }else{
            return redirect()->route('datanilai')->with('fail', 'Data Nilai gagal ditambahkan');
        }
    }

    //semester 4
    public function store4(Request $request)
    {
        //
        // $nisn                   = Auth::user()->nisn;
        // $data['nisn']           = $nisn;
        // $data['semester']       = "S1";
        // $data['mata_pelajaran'] = "BI";
        // $data['nilai']          = $request->bindo;

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
            

            // simpen data jadi array buat disimpan ke database
             $data_to_store[] = [
                'nisn' => $nisn,
                'semester' => $semester,
                'mata_pelajaran' => $mata_pelajaran,
                'nilai' => $nilai,
                'status' => 'Pending'
            ];
        }

        // Simpan data ke db
        foreach ($data_to_store as $data) {
            // dd($request->all());
            Nilai::create($data);
        }

        // $rata_rata = Nilai::where('nisn', $nisn)
        // ->where('semester', $semester)->avg('nilai');
        
        // return view('nilai/data_nilai',[
        //     'nisn' => $nisn,
        //     'title' => 'Input Data Nilai Siswa',
        //     'rata_rata' => $rata_rata
        // ]);
        if($nilai = Nilai::create($data)){
            return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
        }else{
            return redirect()->route('datanilai')->with('fail', 'Data Nilai gagal ditambahkan');
        }
    }
    
    //semester 5
    public function store5(Request $request)
    {
        //
        // $nisn                   = Auth::user()->nisn;
        // $data['nisn']           = $nisn;
        // $data['semester']       = "S1";
        // $data['mata_pelajaran'] = "BI";
        // $data['nilai']          = $request->bindo;

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
            

            // simpen data jadi array buat disimpan ke database
             $data_to_store[] = [
                'nisn' => $nisn,
                'semester' => $semester,
                'mata_pelajaran' => $mata_pelajaran,
                'nilai' => $nilai,
                'status' => 'Pending'
            ];
        }

        // Simpan data ke db
        foreach ($data_to_store as $data) {
            // dd($request->all());
            Nilai::create($data);
        }

        // $rata_rata = Nilai::where('nisn', $nisn)
        // ->where('semester', $semester)->avg('nilai');
        
        // return view('nilai/data_nilai',[
        //     'nisn' => $nisn,
        //     'title' => 'Input Data Nilai Siswa',
        //     'rata_rata' => $rata_rata
        // ]);
        if($nilai = Nilai::create($data)){
            return redirect()->route('datanilai')->with('success', 'Data Nilai berhasil ditambahkan');
        }else{
            return redirect()->route('datanilai')->with('fail', 'Data Nilai gagal ditambahkan');
        }
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
    public function verifikasiGuru(){
        $data = User::join('nilai', 'users.nisn', '=', 'nilai.nisn')
                ->join('siswa', 'users.nisn', '=', 'siswa.nisn')
                ->select('users.nisn', 'users.name', 'siswa.kelas','nilai.semester', 'siswa.jurusan', 'nilai.status','nilai.created_at')
                ->groupBy('users.nisn', 'users.name', 'siswa.kelas','nilai.semester', 'siswa.jurusan', 'nilai.status','nilai.created_at')
                ->OrderBy('nilai.created_at')
                ->where('nilai.status', 'Pending')
                ->limit(1)
                ->get();

        return view('nilai.data_nilai_guru',[
            'title' => 'Verifikasi Nilai',
            'data' => $data
        ]);
    }
    public function verifikasiGuruDetail($nisn){

        $semester1 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S1')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester2 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S2')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester3 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S3')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester4 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S4')
        ->where('nilai.status', 'Pending')
        ->get();

        $semester5 = Siswa::join('nilai', 'siswa.nisn', '=', 'nilai.nisn')
        ->select('siswa.nisn', 'siswa.name','nilai.id','siswa.jurusan','siswa.kelas','nilai.semester', 'nilai.mata_pelajaran', 'nilai.nilai')
        ->where('nilai.nisn', $nisn)
        ->where('nilai.semester', 'S5')
        ->where('nilai.status', 'Pending')
        ->get();
        
        return view('nilai.data_nilai_verifikasi',[
            'title' => 'Verifikasi Nilai',
            'semester1' => $semester1,
            'semester2' => $semester2,
            'semester3' => $semester3,
            'semester4' => $semester4,
            'semester5' => $semester5
        ]);
    }
    public function tolakNilai(Request $request, string $nisn, string $id){

        $nilai = Nilai::where('nisn', $nisn)->where('id', $id)->firstOrFail();
        $nilai->update([
            'status' => $request->status,
        ]);
        
        if($nilai->update()){
            return redirect()->route('verifikasi.nilai',['nisn'=> $nilai->nisn])->with(['success-tolak' => 'Data Nilai Berhasil Ditolak!']);
        } else{
            return redirect()->route('verifikasi.nilai',['nisn'=> $nilai->nisn])->with(['fail' => 'Data Nilai Tidak Berhasil Ditolak!']);
        }
    }
    public function terimaNilai(Request $request, string $nisn, string $id){
        $nilai = Nilai::where('nisn', $nisn)->where('id', $id)->firstOrFail();
        $nilai->update([
            'status' => $request->status,
        ]);

        if($nilai->update()){
            return redirect()->route('verifikasi.nilai',['nisn'=> $nilai->nisn])->with(['success-acc' => 'Data Nilai Berhasil Diverifikasi!']);
        } else{
            return redirect()->route('verifikasi.nilai',['nisn'=> $nilai->nisn])->with(['fail' => 'Data Nilai Tidak Berhasil Diverifikasi!']);
        }
    }
}
