<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
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
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Route;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function users (Request $request){
        $query = User::query();
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
            'password'=>'required',   
            
        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        
            $data['nisn']            = $request->nisn;
            $data['nip']             = $request->nip;
            $data['id_admin']        = $request->id_admin;
            $data['name']            = $request->nama;
            $data['password']        = $request->password;
            $data['role']            = $request->role;

        // create
        if($user = User::create($data)){
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
