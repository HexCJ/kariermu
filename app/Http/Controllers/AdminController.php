<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin (Request $request){
        $query = Admin::query();

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

        return view('admin.admin', [
            'data' => $data,
            'title' => 'Data Admin',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_add',[
            'title' => 'Edit Data Admin',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    
     public function store(Request $request)
     {
         $this->validate($request, [
             'id_admin' => 'required|min:4',
             'nama' => 'required',
             'photo' => 'nullable|mimes:png,jpg,jpeg|max:2048',
             'email' => 'required|email',
             'password' => 'required|min:6',
             'jkelamin' => 'required',
             'alamat' => 'required',
         ]);
     
         $data = [
             'id_admin' => $request->id_admin,
             'name' => $request->nama,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'alamat' => $request->alamat,
             'jenis_kelamin' => $request->jkelamin,
         ];
     
         $photo = $request->file('photo');
         if ($photo) {
             $filename = date('Y-m-d') . '_' . $photo->getClientOriginalName();
             $path = 'photo-admin/' . $filename;
             
             Storage::disk('public')->put($path, file_get_contents($photo));
             $data['photo'] = $filename;
         }
     
         if ($admin = Admin::create($data)) {
             return redirect()->route('admin')->with('success', 'Data berhasil disimpan');
         } else {
             return redirect()->route('admin.create')->with('error', 'Data gagal disimpan');
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
    public function edit(string $id)
    {
    $data = Admin::findOrFail($id);
    return view('admin/admin_update',[
        'title' => 'Edit Data Admin',
        'data' => $data,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $admin = Admin::findOrFail($id); 
        $validator = Validator::make($request->all(),[
            // 'id_admin'=>'required',
            // 'nama'=>'required',
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            'email'=>'required|email|unique:admin,email,'.$admin->id,
            // 'jkelamin'=>'required|in:Laki-laki, Perempuan',
            // 'password'=>'required',   
            // 'alamat'=>'required',     
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        // Ambil data siswa berdasarkan ID
        $data = Admin::find($id);
        $namaadmin = $data->name;

        $data->id_admin = $request->id_admin;
        $data->name = $request->nama;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jkelamin;
        if($request->password){
            $data->password = Hash::make($request->password);
        }

        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-admin/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']         = $filename;

            
        }
    
        // Simpan perubahan data
        if($data->save()){
            $id_admin = $request->id_admin;
            $datauser = User::where('id_admin', $id_admin)->first();
            $datauser->name = $data->name;
            $datauser->password = $data->password;
            $datauser->save();
            return redirect()->route('admin')->with('success-update', 'Data Admin '.$namaadmin.' berhasil diedit');
        }else{
            return redirect()->route('admin')->with('fail', 'Data Admin gagal '.$namaadmin.' diedit');
        }
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Admin::findOrFail($id);
        $namaadmin = $data->name;
        $id_admin = $data->id_admin;
        $dataadmin = User::where('id_admin', $id_admin)->first();

        if($data->delete()){
            $dataadmin->delete();
            return redirect()->back()->with('success-delete', 'Data Siswa '.$namaadmin.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Siswa gagal '.$namaadmin.' dihapus');
        }
    }
}
