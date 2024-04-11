<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;




class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Guru::get();
        return view('teacher/dataguru',compact('data'),
        [
            'title' => 'Data Guru'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matapelajarans = MataPelajaran::all();

        return view('teacher/dataguru_add',[
            'title' => 'Tambah Data Guru' ,
            'matapelajarans' => $matapelajarans 

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        if(Guru::create($data)){
            return redirect()->back()->with('success', 'Data Guru berhasil ditambahkan');
        }else{
            return redirect()->back()->with('fail', 'Data Guru gagal ditambahkan');
        }
        //kembali
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        // Ambil data guru berdasarkan ID
    $data = Guru::findOrFail($id);

    // Ambil data mata pelajaran dari tabel mata pelajaran
    $matapelajarans = MataPelajaran::all();

    return view('teacher/dataguru_update',[
        'title' => 'Edit Data Siswa',
        'data' => $data,
        'matapelajarans' => $matapelajarans // Kirim data mata pelajaran ke view
    ]);
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
            //validator
            $validator = Validator::make($request->all(),[
            // 'nip'=>'required',
            // 'nama'=>'required',
            // 'email'=>'required|email',
            // // 'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            // 'password'=>'required',   
            // 'alamat'=>'required',
            // 'matapelajaran'=>'required|in:MTK, BING',   
   

        ]);
        // jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator); 
        
        // Ambil data siswa berdasarkan ID
        $data = Guru::find($id);

        $data->nip = $request->nip;
        $data->name = $request->nama;
        $data->jenis_kelamin = $request->jkelamin;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->alamat = $request->alamat;
        $data->mata_pelajaran = $request->matapelajaran;

        // Periksa apakah password baru diisi
        if($request->password){
            $data->password = Hash::make($request->password);
        }
    
        // Simpan perubahan data
        if($data->save()){
            return redirect()->back()->with('success', 'Data Guru berhasil diedit');
        }else{
            return redirect()->back()->with('fail', 'Data Guru gagal diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Guru::findOrFail($id);
        if($data->delete()){
            return redirect()->back()->with('success', 'Data Guru berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Guru gagal dihapus');
        }
    }
}
