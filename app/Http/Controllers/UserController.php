<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\User;
use App\Models\Jurusan;
use App\Models\Laporan;
use App\Models\Nilai;
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
            // 'nip'=>'required',
            // 'nama'=>'required',
            // 'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            // 'password'=>'required',   
        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        //terima dan kirim
        // $photo    = $request->file('photo');
        // if($photo){
        //     $filename = date('Y-m-d').$photo->getClientOriginalName();
        //     $path     = 'photo-user/'.$filename;
            
        //     Storage::disk('public')->put($path,file_get_contents($photo));
        // }
        // $data['nisn']          = $request->nisn;
        // $photo                 = $request->file('photo');
        // if($photo){
        //     $filename          = date('Y-m-d').$photo->getClientOriginalName();
        //     $path              = 'photo-user/'.$filename;
    
        //     Storage::disk('public')->put($path,file_get_contents($photo));
        //     $data['image']     = $filename;     
        // }
        // $data['name']          = $request->nama;
        // $data['jenis_kelamin'] = $request->jkelamin;
        // $data['jurusan']       = $request->jurusan;
        // $data['kelas']         = $request->kelas;
        // $data['email']         = $request->email;
        // $data['password']      = Hash::make($request->password);
        // $data['alamat']        = $request->alamat;
        // $data['tahun_lulus']   = $request->lulus;
        // $data['status']        = $request->status;
        
            $data['nisn']            = $request->nisn;
            $data['nip']             = $request->nip;
            $data['id_admin']        = $request->id_admin;
            $data['name']            = $request->nama;
            $data['password']        = $request->password;
            $data['role']            = $request->role;

        // if($request->nisn){
        //     $data['nisn']        = $request->nisn;
        // }
        // if($request->nip){
        //     $data['nip']        = $request->nip;
        // }
        // if($request->id_admin){
        //     $data['id_admin']        = $request->id_admin;
        // }
        
        // create
        if($user = User::create($data)){
            if ($request->role === 'Siswa') {
                $siswa = Siswa::create($data);
                // $datanilaisiswa = Nilai::create(['nisn' => $request->nisn]); 
                $datalaporansiswa = Laporan::create(['nisn' => $request->nisn, 'name' => $request->name]); 
                $user->assignRole('siswa');
            }else if ($request->role === 'Guru'){
                // Berikan peran 'siswa' jika tidak
                $guru = Guru::create($data);
                $user->assignRole('guru');            
            }else if ($request->role === 'Admin'){
                // Berikan peran 'siswa' jika tidak
                $admin = Admin::create($data);
                $user->assignRole('admin');            
            }
            //kembali
            return redirect()->route('users')->with('success', 'Data User berhasil ditambahkan');
        }else{
            return redirect()->route('users')->with('fail', 'Data User gagal ditambahkan');
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
    public function update(Request $request,$id)
    {
        //validator
        $validator = Validator::make($request->all(),[
            // 'password'=>'required',   
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $data = User::find($id);
        $data->name = $request->nama;
        // $data->nisn = $request->nisn;
        // $data->nip = $request->nip;
        // $data->id_admin = $request->id_admin;
        // dd($request->all());
        // $data->email = $request->email;
        
        if($request->password){
            $data->password = Hash::make($request->password);
        }

        if($data->save()){

            if($data->role === 'Siswa')
            {
                $nisn = $request->nisn;
                $datasiswa = Siswa::where('nisn', $nisn)->first();
                $datanilai = Nilai::where('nisn', $nisn)->first();
                $datalaporan = Laporan::where('nisn', $nisn)->first();
                $datasiswa->name = $data->name;
                $datalaporan->name = $data->name;
                // $datasiswa->email = $data->email;
                $datasiswa->password = $data->password;
                $datasiswa->save();
                $datanilai->save();
                $datalaporan->save();
                return redirect()->route('users')->with('success-update', 'Data Siswa berhasil diedit');
            }
            else if ($data->role === 'Guru'){
                $nip = $request->nip;
                $dataguru = Guru::where('nip', $nip)->first();
                $dataguru->name = $data->name;
                // $dataguru->email = $data->email;
                $dataguru->password = $data->password;
                $dataguru->save();
                return redirect()->route('users')->with('success-update', 'Data Guru berhasil diedit');            
            }
            else if ($data->role === 'Admin'){
                $id_admin = $request->id_admin;
                $dataadmin = Admin::where('id_admin', $id_admin)->first();
                $dataadmin->name = $data->name;
                // $dataadmin->email = $data->email;    
                $dataadmin->password = $data->password;
                $dataadmin->save();
                return redirect()->route('users')->with('success-update', 'Data Admin berhasil diedit');        
            }
        }

        else{
            return redirect()->route('users')->with('fail', 'Data Siswa gagal diedit');
        }
    
        
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
