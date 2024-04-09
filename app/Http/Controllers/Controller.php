<?php

namespace App\Http\Controllers;

//tampilin user
use App\Models\User;
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
    public function profile()
    {   
        return view('data-profile',[
            'title' => 'Data Profile'
        ]);
    }

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
    public function DataSiswa()
    {   
        //tampilin data
        $data = User::get();
        return view('student/datasiswa',compact('data'),[
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


    //form
    public function input(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nisn'=>'required',
            'nama'=>'required',
            // 'email'=>'required|email',
            'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            'jurusan'=>'required|in:RPL, DGM, DPIB, TITL',   
            // 'kelas'=>'required|in:X/SEPULUH, XI/SEBELAS, XII/DUA BELAS',   
            'password'=>'required',   
            'alamat'=>'required',   
            'lulus'=>'required',   
            'status'=>'required|in:Belum Lulus, Lulus',   

        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
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
        

        User::create($data);

        return redirect()->route('siswa');
    }
    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('student/datasiswa_update',compact('data'),
        [
            'title' => 'Edit Data Siswa'
        ]);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nisn'=>'required',
            'nama'=>'required',
            // 'email'=>'required|email',
            'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            'jurusan'=>'required|in:RPL, DGM, DPIB, TITL',   
            // 'kelas'=>'required|in:X/SEPULUH, XI/SEBELAS, XII/DUA BELAS',   
            'alamat'=>'required',   
            'lulus'=>'required',   
            'status'=>'required|in:Belum Lulus, Lulus',   
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
    
    public function hapus($id)
    {
    $data = user::findOrFail($id);
    $data->delete();

    return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
    }
}
