<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Laporan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Route;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        // public function index()
    // {
    //     //tampilin data
    //     $data = User::get();
    //     $jurusans = Jurusan::all();
    //     return view('student/datasiswa',compact('data'),[
    //         'title' => 'Data Siswa',
    //         'jurusans' => $jurusans
    //     ]);
    // }
    public function siswa (Request $request){
        $query = Siswa::query();

        // Tampilin data
        if ($request->has('search')) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }
        // Tampilkan data
        if ($request->filled('jurusan')) {
            $query->where('jurusan', $request->input('jurusan'));
        }
        // Tampilkan data
        if ($request->filled('kelas')) {
            $query->where('kelas', $request->input('kelas'));
        }
        // Tampilkan data
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->input('jenis_kelamin'));
        }
        // Tampilkan data
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        
    
        $data = $query->get();
        $jurusans = Jurusan::all();
    
        return view('student.datasiswa', [
            'data' => $data,
            'title' => 'Data Siswa',
            'jurusans' => $jurusans
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
        $validator = Validator::make($request->all(),[
            'nisn'=>'required',
            'nama'=>'required',
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            'email'=>'required|email',
            'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            'jurusan'=>'required',   
            'kelas'=>'required',   
            'password'=>'required',   
            'alamat'=>'required',   
            'status'=>'required',   
            'lulus'=> 'nullable',  
        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        //terima dan kirim
        $photo    = $request->file('photo');
        if($photo){

            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-user/'.$filename;
            
            Storage::disk('public')->put($path,file_get_contents($photo));
        }
        

        $data['nisn']          = $request->nisn;
        $photo                 = $request->file('photo');

        if($photo){
            $filename          = date('Y-m-d').$photo->getClientOriginalName();
            $path              = 'photo-user/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']     = $filename;

            
        }
        $data['name']          = $request->nama;
        $data['jenis_kelamin'] = $request->jkelamin;
        $data['jurusan']       = $request->jurusan;
        $data['kelas']         = $request->kelas;
        $data['urutan_kelas']   = $request->urutan_kelas;
        $data['email']         = $request->email;
        $data['password']      = Hash::make($request->password);
        $data['alamat']        = $request->alamat;
        $data['tahun_lulus']   = $request->lulus;
        $data['status']        = $request->status;
        
        
        
        // create
        if($siswa = Siswa::create($data)){
            return redirect()->route('siswa')->with('success', 'Data Siswa berhasil ditambahkan');
        }else{
            return redirect()->route('siswa')->with('fail', 'Data Siswa gagal ditambahkan');
        }

    // Jika nama pengguna adalah 'guru', berikan peran 'guru'

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
    $data = Siswa::findOrFail($id);

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
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
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
        $data = Siswa::find($id);
        $namasiswa = $data->name;

    
        // Mengisi data dengan input dari form
        $data->nisn = $request->nisn;
        $data->name = $request->nama;
        $data->jenis_kelamin = $request->jkelamin;
        $data->jurusan = $request->jurusan;
        $data->kelas = $request->kelas;
        $data->urutan_kelas = $request->urutan_kelas;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->tahun_lulus = $request->lulus;
        $data->status = $request->status;
    
        // Periksa apakah password baru diisi

        if($request->password){
            $data->password = Hash::make($request->password);
        }

        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-user/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']         = $filename;

            
        }
    
        // Simpan perubahan data
        if($data->save()){
            $nisn = $request->nisn;
            $datauser = User::where('nisn', $nisn)->first();
            $datauser->name = $data->name;
            $datauser->password = $data->password;
            $datauser->save();
            
            return redirect()->route('siswa')->with('success-update', 'Data Siswa '.$namasiswa.' berhasil diedit');
        }else{
            return redirect()->route('siswa')->with('fail', 'Data Siswa gagal '.$namasiswa.' diedit');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = Siswa::findOrFail($id);
        $namasiswa = $data->name;
        $nisn = $data->nisn;
        $datasiswa = User::where('nisn', $nisn)->first();
        
        if($data->delete()){
            $datasiswa->delete();
            return redirect()->back()->with('success-delete', 'Data Siswa '.$namasiswa.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Siswa gagal '.$namasiswa.' dihapus');
        }
    }

    // public function search(Request $request)
    // {
    //     $category = $request->input('category');
    
    //     $products = Jurusan::where('category', $category)->get();
    
    //     return view('search', compact('data','products'));
    // }

    public function import_siswa(Request $request){
        $this->validate($request,[
            'siswa_excel' => 'required|mimes:csv,xls,xlsx'
        ]);

        $siswa_excel = $request->siswa_excel;
        $excel = $siswa_excel->HashName();

        $path = $siswa_excel->storeAs('public/excel/',$excel);

        try {
            Excel::import(new SiswaImport, storage_path('app/public/excel/' . $excel));
            storage::delete('public/excel/' . $excel);
    
            return redirect()->route('siswa')->with(['success' => 'Data Berhasil Diimport!']);
        } catch (\Exception $e) {
            storage::delete('public/excel/' . $excel);
            
            return redirect()->route('siswa')->with(['fail' => 'Data Gagal Diimport! Error: ' . $e->getMessage()]);
        }
    }
}
