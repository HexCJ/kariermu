<?php

namespace App\Http\Controllers;

//test
use Spatie\Permission\Models\Role;
//
use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;
use App\Models\MataPelajaran;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
         // Tampilkan data
        //  if ($request->filled('kelas')) {
        //      $query->where('kelas', $request->input('kelas'));
        //  }
         // Tampilkan data
        //  if ($request->filled('status')) {
        //      $query->where('status', $request->input('status'));
        //  }
     
         $data = $query->get();
         $matapelajarans = MataPelajaran::all();
     
         return view('teacher.dataguru', [
            'data' => $data,
            'title' => 'Data Guru',
            'matapelajarans' => $matapelajarans 
         ]);
     }
     
    // public function index()
    // {
    //     $data = Guru::get();
    //     return view('teacher/dataguru',compact('data'),
    //     [
    //         'title' => 'Data Guru'
    //     ]);
    // }

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
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            'email'=>'required|email',
            // 'jkelamin'=>'required|in:Laki-laki, Perempuan',   
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

        // $newGuru = Guru::request($data);
        // $newGuru->assignRole('admin');

        // $guru = Guru::updateOrCreate([
        //     'nip'=>'request->nip',
        // ]);

    
        
        //create
        if(Guru::create($data)){
            return redirect()->route('guru')->with('success', 'Data Guru berhasil ditambahkan');

        }else{
            return redirect()->route('guru')->with('fail', 'Data Guru gagal ditambahkan');
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
        'title' => 'Edit Data Guru',
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
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
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
        $namaguru = $data->name;


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

        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-guru/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']         = $filename;

            
        }
    
        // Simpan perubahan data
        if($data->save()){
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
        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Guru '.$namaguru.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Guru'.$namaguru.'gagal dihapus');
        }
    }
}
