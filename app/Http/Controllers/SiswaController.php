<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan; 
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(),[
            'nisn'=>'required',
            'nama'=>'required',
            // 'email'=>'required|email',
            // 'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            // 'jurusan'=>'required|in:RPL, DGM, DPIB, TITL',   
            // 'kelas'=>'required|in:X/SEPULUH, XI/SEBELAS, XII/DUA BELAS',   
            'password'=>'required',   
            'alamat'=>'required',   
            'lulus'=>'required',   
            // 'status'=>'required|in:Belum Lulus, Lulus',   

        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        //terima dan kirim
        $data['nisn'] = $request->nisn;
        $data['name'] = $request->nama;
        $data['jenis_kelamin'] = $request->jkelamin;
        $data['jurusan'] = $request->jurusan;
        $data['kelas'] = $request->kelas;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['alamat'] = $request->alamat;
        $data['tahun_lulus'] = $request->lulus;
        $data['status'] = $request->status;
        
        //create
        User::create($data);
        //kembali
        return redirect()->route('siswa');
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
    public function edit(Request $request,$id)
    {
        // Ambil data siswa berdasarkan ID
    $data = User::findOrFail($id);

    // Ambil data jurusan dari tabel jurusan
    $jurusans = Jurusan::all();

    return view('student/datasiswa_update',[
        'title' => 'Edit Data Siswa',
        'data' => $data,
        'jurusans' => $jurusans // Kirim data jurusan ke view
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //validator
        $validator = Validator::make($request->all(),[
            // 'nisn'=>'required',
            // 'nama'=>'required',
            // 'email'=>'required|email',
            // 'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            // 'jurusan'=>'required|in:RPL, DGM, DPIB, TITL',   
            // 'kelas'=>'required|in:X/SEPULUH, XI/SEBELAS, XII/DUA BELAS',   
            // 'password'=>'required',   
            // 'alamat'=>'required',   
            // 'lulus'=>'required',   
            // 'status'=>'required|in:Belum Lulus, Lulus',   
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        // Ambil data siswa berdasarkan ID
        $data = User::find($id);
    
        // Mengisi data dengan input dari form
        $data->nisn = $request->nisn;
        $data->name = $request->nama;
        $data->jenis_kelamin = $request->jkelamin;
        $data->jurusan = $request->jurusan;
        $data->kelas = $request->kelas;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->tahun_lulus = $request->lulus;
        $data->status = $request->status;
    
        // Periksa apakah password baru diisi
        if($request->password){
            $data->password = Hash::make($request->password);
        }
    
        // Simpan perubahan data
        $data->save();
    
        return redirect()->route('siswa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = user::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
    }
}
