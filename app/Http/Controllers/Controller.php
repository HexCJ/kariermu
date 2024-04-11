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
    public function profile()
    {   
        return view('data-profile',[
            'title' => 'Data Profile'
        ]);
    }

    public function dataKelas()
    {   
        return view('data-kelas.data-kelas',[
            'title' => 'Data Jurusan'
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
        $jurusans = Jurusan::all();

        return view('student/datasiswa_add',[
            'title' => 'Tambah Data Siswa' ,
            'jurusans' => $jurusans 

        ]);
    }
    public function editDataSiswa($id)
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
    // public function editDataSiswa()
    // {   
    //     return view('student/datasiswa_update',
    //     [
    //         'title' => 'Edit Data Siswa'
    //     ]);
    // }
    public function dataGuru()
    {   
        $data = Guru::get();
        return view('teacher/dataguru',compact('data'),
        [
            'title' => 'Data Guru'
        ]);
    }
    public function addDataGuru()
    {   
        $matapelajarans = MataPelajaran::all();

        return view('teacher/dataguru_add',[
            'title' => 'Tambah Data Guru' ,
            'matapelajarans' => $matapelajarans 

        ]);
    }
    public function editDataGuru()
    {   
        return view('teacher/dataguru_update',[
            'title' => 'Edit Data Guru' ,
        ]);
    }


    //form siswa
    //add siswa
    public function input(Request $request)
    {
        //validator
        $validator = Validator::make($request->all(),[
            'nisn'=>'required',
            'nama'=>'required',
            // 'email'=>'required|email',
            'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            // 'jurusan'=>'required|in:RPL, DGM, DPIB, TITL',   
            // 'kelas'=>'required|in:X/SEPULUH, XI/SEBELAS, XII/DUA BELAS',   
            'password'=>'required',   
            'alamat'=>'required',   
            'lulus'=>'required',   
            'status'=>'required|in:Belum Lulus, Lulus',   

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
    //edit siswa
    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('student/datasiswa_update',compact('data'),
        [
            'title' => 'Edit Data Siswa'
        ]);
    }
    //update siswa
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
    //hapus siswa
    public function hapus($id)
    {
    $data = user::findOrFail($id);
    $data->delete();

    return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
    }

    //form guru
    public function inputGuru(Request $request)
    {
        //validator
        $validator = Validator::make($request->all(),[
            'nip'=>'required',
            'nama'=>'required',
            'email'=>'required|email',
            // 'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            'password'=>'required',   
            'alamat'=>'required',
            // 'matapelajaran'=>'required|in:MTK, BING',   
   

        ]);
        // jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // terima dan kirim
        $data['nip'] = $request->nip;
        $data['name'] = $request->nama;
        $data['jenis_kelamin'] = $request->jkelamin;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['alamat'] = $request->alamat;
        $data['mata_pelajaran'] = $request->matapelajaran;
        
        //create
        Guru::create($data);
        //kembali
        return redirect()->route('guru');
        // dd($request->all());
    }
}
