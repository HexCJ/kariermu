<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class DataKarirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data-karir',[
            'title' => 'Data Karir',
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        // ambil nip dari user
        $nisn = $user->nisn;
        $status_siswa = Siswa::where('nisn', $nisn)->select('status')->first();
        $siswa = Laporan::where('nisn', $nisn)->first();

        return view('data-karir',[
            'siswa' => $siswa,
            'status_siswa' => $status_siswa ,
            'title' => 'Data Karir'

        ]);
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
        // $validator = Validator::make($request->all(),[
        //     // 'nisn'=>'required',
        //     // 'nama'=>'required',

        // ]);
    
        // if($validator->fails()) {
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }
        $user = Auth::user();

        // ambil nip dari user
        $nisn = $user->nisn;
        $siswa = Laporan::where('nisn', $nisn)->first();
        if($request->filled('status')){
            $siswa->status = $request->status;
            if($siswa->tempat_kerja_kuliah){
                Laporan::where('nisn', $nisn)->update(['tempat_kerja_kuliah' => null]);
            }
            $siswa->tempat_kerja_kuliah = $request->tempat_kerja_kuliah;
            if($siswa->save()){
                return redirect()->route('karir')->with('success_lapor', 'Laporan anda berhasil simpan');
                if($siswa->status === 'Kuliah' ){
                    $datanilai = Nilai::create(['nisn' => $siswa->nisn]); 
                    return redirect()->route('karir')->with('success_lapor', 'Laporan anda berhasil simpan');
                }
            }else{
                return redirect()->route('karir')->with('fail', 'Laporan anda gagal simpan');
            }
        }
        else{
            return redirect()->route('karir')->with('no_lapor', 'Tidak ada Laporan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
