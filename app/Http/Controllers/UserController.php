<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function users (Request $request){
        $query = User::query();

        // // Tampilin data
        // if ($request->has('search')) {
        //     $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        // }
        // // Tampilkan data
        // if ($request->filled('jurusan')) {
        //     $query->where('jurusan', $request->input('jurusan'));
        // }
        // // Tampilkan data
        // if ($request->filled('kelas')) {
        //     $query->where('kelas', $request->input('kelas'));
        // }
        // // Tampilkan data
        // if ($request->filled('jenis_kelamin')) {
        //     $query->where('jenis_kelamin', $request->input('jenis_kelamin'));
        // }
        // // Tampilkan data
        // if ($request->filled('status')) {
        //     $query->where('status', $request->input('status'));
        // }
        
        $data = $query->get();

        return view('users.users', [
            'data' => $data,
            'title' => 'Data Users',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/users_add',[
            'title' => 'Tambah Data Users' ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'nip'=>'required',
            'nama'=>'required',
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            'password'=>'required',   
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
        $data['email']         = $request->email;
        $data['password']      = Hash::make($request->password);
        $data['alamat']        = $request->alamat;
        $data['tahun_lulus']   = $request->lulus;
        $data['status']        = $request->status;
        
        $user = User::create($data);
        $siswa = Siswa::create($data);
        
        
        // create
        if($user = User::create($data)){
            if ($request->nama === 'guru') {
                $user->assignRole('guru');
            } else {
                // Berikan peran 'siswa' jika tidak
                $user->assignRole('siswa');
            }
            //kembali
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
    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $data = User::findOrFail($id);

        // Ambil data jurusan dari tabel jurusan
        return view('users/users_update',[
            'title' => 'Edit Data Users',
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $data = user::findOrFail($id);
        $namasiswa = $data->id;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Siswa '.$namasiswa.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Siswa gagal '.$namasiswa.' dihapus');
        }
    }
}
