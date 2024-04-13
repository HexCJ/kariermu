<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan; 
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Route;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tampilin data
        $data = User::get();
        return view('student/datasiswa',compact('data'),[
            'title' => 'Data Siswa',
        ]);
    }
    
    // public function serverside(Request $request){
    //     if($request->ajax()){
    //         $data = new User;
    //         $data = $data->latest();
    //         return DataTables::of($data)
    //         ->addColumn('nisn', function($data){
    //             return $data->nisn;
    //         })
    //         ->addColumn('name', function($data){
    //             return $data->name;
    //         })
    //         ->addColumn('jenis_kelamin', function($data){
    //             return $data->jenis_kelamin;
    //         })
    //         ->addColumn('jurusan', function($data){
    //             return $data->jurusan;
    //         })
    //         ->addColumn('kelas', function($data){
    //             return $data->kelas;
    //         })
    //         ->addColumn('email', function($data){
    //             return $data->email;
    //         })
    //         ->addColumn('password', function($data){
    //             return $data->password;
    //         })
    //         ->addColumn('alamat', function($data){
    //             return $data->alamat;
    //         })
    //         ->addColumn('tahun_lulus', function($data){
    //             return $data->tahun_lulus;
    //         })
    //         ->addColumn('status', function($data){
    //             return $data->status;
    //         })
    //         ->addColumn('aksi', function($data) {
    //             return 
    //             '<div class="dropdown py-3">
    //                 <a class="button py-2 px-3 rounded text-decoration-none text-center dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    //                     <i class="bi bi-person-fill-gear me-2 i-icon"></i>Option
    //                 </a>
    //                 <ul class="dropdown-menu">
    //                     <li><a href="' . route('user.edit',['id' => $data->id]) . '" class="dropdown-item"><i class="bi bi-person-fill-gear me-2 i-icon"></i>Edit</a></li>
    //                     <form id="hapus-siswa-' . $data->id . '" action="' . route('siswa.hapus', ['id' => $data->id]) . '" method="POST">
    //                     <input type="hidden" name="_method" value="DELETE">
    //                     <input type="hidden" name="_token" value="' . csrf_token() . '">
    //                         <li>
    //                             <button type="submit" class="dropdown-item text-danger">
    //                                 <i class="bi bi-person-fill-dash me-2 i-icon"></i>Hapus
    //                             </button>
    //                         </li>
    //                     </form>
    //                 </ul>
    //             </div>';
    //         })
    //         ->rawColumns(['aksi'])
    //         ->make(true);
    //     }
    //     return view('student.datasiswa', compact('request'),[
    //         'title' => 'Data Siswa'
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();

        return view('student/datasiswa_add',[
            'title' => 'Tambah Data Siswa' ,
            'jurusans' => $jurusans 
        ]);
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
        if(User::create($data)){
            //kembali
            return redirect()->route('siswa')->with('success', 'Data Siswa berhasil ditambahkan');
        }else{
            return redirect()->route('siswa')->with('fail', 'Data Siswa gagal ditambahkan');
        }
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
        if($data->save()){
            return redirect()->route('siswa')->with('success', 'Data Siswa berhasil diedit');
        }else{
            return redirect()->route('siswa')->with('fail', 'Data Siswa gagal diedit');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = user::findOrFail($id);
        if($data->delete()){
            return redirect()->back()->with('success', 'Data Siswa berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Siswa gagal dihapus');
        }
    }
}
