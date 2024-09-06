<?php

namespace App\Http\Controllers;

//test

use App\Imports\GuruImport;
use Spatie\Permission\Models\Role;
//
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function guru (Request $request)
     {
         $query = Guru::query();
 
         // Tampilin data
         if ($request->has('search')) {
             $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
         }
         // Tampilkan data
         if ($request->filled('mata_pelajaran')) {
             $query->where('mata_pelajaran', $request->input('mata_pelajaran'));
         }
         // Tampilkan data
         if ($request->filled('jenis_kelamin')) {
             $query->where('jenis_kelamin', $request->input('jenis_kelamin'));
         }

     
         $data = $query->get();
         $matapelajarans = MataPelajaran::all();
         $jurusans = Jurusan::all();

         return view('teacher.dataguru', [
            'data' => $data,
            'title' => 'Data Guru',
            'matapelajarans' => $matapelajarans,
            'jurusans' => $jurusans

         ]);
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matapelajarans = MataPelajaran::all();
        $jurusans = Jurusan::all();

        return view('teacher/dataguru_add',[
            'title' => 'Tambah Data Guru' ,
            'matapelajarans' => $matapelajarans,
            'jurusans' => $jurusans 
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
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            'email'=>'required|email|unique:guru,email',
            'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            'password'=>'required',   
            'alamat'=>'required',
            // 'matapelajaran'=>'required|in:MTK, BING',   
        ]);
        // jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // terima dan kirim
        
        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-guru/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
        }

        $data['nip'] = $request->nip;
        $data['name'] = $request->nama;
        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-guru/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']         = $filename;

            
        }        
        $data['jenis_kelamin'] = $request->jkelamin;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['alamat'] = $request->alamat;
        $data['mata_pelajaran'] = $request->matapelajaran;
        $data['jurusan']       = $request->jurusan;
        $data['walikelas']         = $request->kelas;
        $data['urutan_kelas']   = $request->urutan_kelas;
    
        //create
        if(Guru::create($data)){
            return redirect()->route('guru')->with('success', 'Data Guru berhasil ditambahkan');

        }else{
            return redirect()->route('guru')->with('fail', 'Data Guru gagal ditambahkan');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id){
            // Ambil data guru berdasarkan ID
        $data = Guru::findOrFail($id);
        $jurusans = Jurusan::all();
        $matapelajarans = MataPelajaran::all();

        return view('teacher/dataguru_update',[
            'title' => 'Edit Data Guru',
            'data' => $data,
            'matapelajarans' => $matapelajarans, // Kirim data mata pelajaran ke view
            'jurusans' => $jurusans // Kirim data mata pelajaran ke view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = Guru::findOrFail($id);
            $validator = Validator::make($request->all(),[
            // 'nip'=>'required',
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            'email'=>'required|email|unique:guru,email,'.$data->id,
            // 'nama'=>'required',
            // // 'jkelamin'=>'required|in:Laki-laki, Perempuan',   
            // 'password'=>'required',   
            // 'alamat'=>'required',
            // 'matapelajaran'=>'required|in:MTK, BING',   
   

        ]);
        // jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator); 
        
        // Ambil data siswa berdasarkan ID
        $data = Guru::find($id);
        $namaguru = $data->name;


        $data->nip = $request->nip;
        $data->name = $request->nama;
        $data->jenis_kelamin = $request->jkelamin;
        $data->email = $request->email;
        $data->alamat = $request->alamat;
        $data->mata_pelajaran = $request->matapelajaran;
        $data->jurusan = $request->jurusan;
        $data->walikelas = $request->kelas;
        $data->urutan_kelas = $request->urutan_kelas;

        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-guru/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']         = $filename;

            
        }
    
        // Simpan perubahan data
        if($data->save()){
            $nip = $request->nip;
            $datauser = User::where('nip', $nip)->first();
            $datauser->name = $data->name;
            $datauser->save();
            return redirect()->route('guru')->with('success-update', 'Data Guru '.$namaguru.' berhasil diedit');
        }else{
            return redirect()->route('guru')->with('fail', 'Data Guru '.$namaguru.' gagal diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Guru::findOrFail($id);
        $namaguru = $data->name;
        $nip = $data->nip;
        $dataguru = User::where('nip', $nip)->first();

        if($data->delete()){
            $dataguru->delete();
            return redirect()->back()->with('success-delete', 'Data Guru '.$namaguru.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Guru'.$namaguru.'gagal dihapus');
        }
    }
    public function import_guru(Request $request){
        $this->validate($request,[
            'guru_excel' => 'required|mimes:csv,xls,xlsx'
        ]);

        $guru_excel = $request->guru_excel;
        $excel = $guru_excel->HashName();

        $path = $guru_excel->storeAs('public/excel/',$excel);
        try {
            Excel::import(new GuruImport, storage_path('app/public/excel/'.$excel));
            storage::delete('public/excel/' . $excel);
            return redirect()->route('guru')->with(['success' => 'Data Berhasil Diimport!']);
        } catch (\Exception $e) {
            return redirect()->route('guru')->with(['fail-import' => 'Data Gagal Diimport!']);
        }
    }
}
