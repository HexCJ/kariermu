<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\User;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Laporan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        return view('data-profile',[
            'title' => 'Data Profile'
        ]);
    }
    public function edit(Request $request): View
    {
            // // ambil yang  login
            // $user = Auth::user();
            // // kalo gak ada guru, coba cari siswa berdasarkan nisn
            // $nisn = $user->nisn;
            // if (!empty($nisn)) {
            // // Jika nisn ada, cari data siswa berdasarkan nisn
            // $siswa = Siswa::where('nisn', $nisn)->first();

            // // kalo data siswa ketemu, balik ke view dengan data siswa
            // if ($siswa) {
            // $jurusans = Jurusan::all();
            // return view('profile.edit', [
            //     'siswa' => $siswa,
            //     'title' => 'Data Profile'
            // ]);
            // }
            // }

            // Ambil NISN pengguna yang sedang login
            $nisn = Auth::user()->nisn;
            $jurusans = Jurusan::all();

            // Ambil data profil berdasarkan NISN pengguna yang sedang login
            $siswa = Siswa::where('nisn', $nisn)->first();
            
            return view('profile.edit', [
            'siswa' => $siswa,
            'title' => 'Edit Profil',
            ]);

        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
    }
    /**
     * Update the user's profile information.
     */
    public function profilefoto(Request $request, string $id): RedirectResponse
    {
        //siswa
        
        $validator = Validator::make($request->all(),[
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
            
        }

        $user = Auth::user();
        // ambil nisn dari user

        $nisn = $user->nisn;
        $siswa = Siswa::where('nisn', $nisn)->first();
        $namasiswa = $siswa->name;

        $photo    = $request->file('photo');
        if($photo){
            if($siswa->image){
                Storage::disk('public')->delete('photo-user/'.$siswa->image);
            }
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-user/'.$filename;
            
            Storage::disk('public')->put($path,file_get_contents($photo));
            $siswa['image']         = $filename;  
        }
        // dd($request->all());
    
        // Simpan perubahan data
        if($siswa->save()){
            $datauser = User::where('nisn', $nisn)->first();
            $datauser->save();

            return redirect()->route('profile')->with('success-profile', 'Data Siswa '.$namasiswa.' berhasil diedit');
        }else{
            return redirect()->route('profile')->with('fail', 'Data Siswa gagal '.$namasiswa.' diedit');
        }
        //end siswa
    }
    public function profilefotoguru(Request $request, string $id): RedirectResponse
    {
        //guru
         //validator
         $validator = Validator::make($request->all(),[
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408', 
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = Auth::user();
        // ambil nisn dari user

        $nip = $user->nip;
        $guru = Guru::where('nip', $nip)->first();
        $namaguru = $guru->name;

        $photo    = $request->file('photo');
        if($photo){
            if($guru->image){
                Storage::disk('public')->delete('photo-guru/'.$guru->image);
            }
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-guru/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $guru['image']         = $filename;
        }
        // dd($request->all());
    
        // Simpan perubahan data
        if($guru->save()){
            $datauser = User::where('nip', $nip)->first();
            $datauser->save();

            return redirect()->route('profile')->with('success-profile', 'Data Guru '.$namaguru.' berhasil diedit');
        }else{
            return redirect()->route('profile')->with('fail', 'Data Guru gagal '.$namaguru.' diedit');
        }
        //end siswa
    }
    public function profilefotoadmin(Request $request, string $id): RedirectResponse
    {
        //admin
         //validator
         $validator = Validator::make($request->all(),[
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = Auth::user();
        // ambil nisn dari user

        $id_admin = $user->id_admin;
        $admin = Admin::where('id_admin', $id_admin)->first();
        $namaadmin = $admin->name;

        $photo    = $request->file('photo');

        if($photo){
            if($admin->image){
                Storage::disk('public')->delete('photo-admin/'.$admin->image);
            }
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-admin/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $admin['image']         = $filename;
        }
        // Simpan perubahan data
        if($admin->save()){
            $datadmin = User::where('id_admin', $id_admin)->first();
            $datadmin->save();

            return redirect()->route('profile')->with('success-profile', 'Data Guru '.$namaadmin.' berhasil diedit');
        }else{
            return redirect()->route('profile')->with('fail', 'Data Admin gagal '.$namaadmin.' diedit');
        }
        //end siswa
    }

    public function updatesiswa(Request $request, string $id): RedirectResponse
    {
        //siswa
        if($request->filled('kelas') &&
            $request->filled('jurusan') &&
            $request->filled('email') &&
            $request->filled('alamat') &&
            $request->filled('jkelamin'))
            {
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
    
            $user = Auth::user();
            // ambil nisn dari user
    
            $nisn = $user->nisn;
            $siswa = Siswa::where('nisn', $nisn)->first();
            $namasiswa = $siswa->name;
    
            // Mengisi data/siswa dengan input dari form
            $siswa->nisn = $siswa->nisn;
            $siswa->name = $request->nama;
            $siswa->jenis_kelamin = $request->jkelamin;
            $siswa->jurusan = $request->jurusan;
            $siswa->kelas = $request->kelas;
            $siswa->urutan_kelas = $request->urutan_kelas;
            $siswa->email = $request->email;
            $siswa->alamat = $request->alamat;
            $siswa->tahun_lulus = $request->lulus;
            $siswa->status = $request->status;
    
            // Periksa apakah password baru diisi
            if($request->password){
                $siswa->password = Hash::make($request->password);
            }
            $photo    = $request->file('photo');
            if($photo){
                if($siswa->image){
                    Storage::disk('public')->delete('photo-user/'.$siswa->image);
                }
                $filename = date('Y-m-d').$photo->getClientOriginalName();
                $path     = 'photo-user/'.$filename;
                
                Storage::disk('public')->put($path,file_get_contents($photo));
                $siswa['image']         = $filename;  
            }
            // dd($request->all());
            // Simpan perubahan data
            if($siswa->save()){
                return redirect()->route('profile')->with('success-edit-profile', 'Data Siswa '.$namasiswa.' berhasil diedit');
            }else{
                return redirect()->route('profile')->with('fail', 'Data Siswa gagal '.$namasiswa.' diedit');
            }
        } else {
            return redirect()->route('profile')->with('fail-profile', 'Anda Belum Mengisi Biodata.');
        }
    }
    
    public function updateguru(Request $request, string $id): RedirectResponse
    {
        //guru
        
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
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
            
        }

        $user = Auth::user();
        // ambil nisn dari user

        $nip = $user->nip;
        $guru = Guru::where('nip', $nip)->first();
        $namaguru = $guru->name;

        // Mengisi data/siswa dengan input dari form
        $guru->nip = $guru->nip;
        $guru->name = $request->nama;
        $guru->jenis_kelamin = $request->jkelamin;
        $guru->email = $request->email;
        $guru->password = Hash::make($request->password);
        $guru->alamat = $request->alamat;
        $guru->mata_pelajaran = $request->matapelajaran;
        $guru->jurusan = $request->jurusan;
        $guru->walikelas = $request->kelas;
        $guru->urutan_kelas = $request->urutan_kelas;

        // Periksa apakah password baru diisi
        if($request->password){
            $guru->password = Hash::make($request->password);
        }

        $photo    = $request->file('photo');
        if($photo){
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-guru/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $guru['image']         = $filename;

            
        }
        // dd($request->all());
    
        // Simpan perubahan data
        if($guru->save()){
            // $datauser = User::where('nip', $nip)->first();
            // $datauser->name = $guru->name;
            // $datauser->email = $guru->email;
            // $datauser->save();

            return redirect()->route('profile')->with('success-edit-profile', 'Data Guru '.$namaguru.' berhasil diedit');
        }else{
            return redirect()->route('profile')->with('fail', 'Data Guru gagal '.$namaguru.' diedit');
        }
        //end siswa
    }

    public function updateadmin(Request $request, string $id): RedirectResponse
    {
         //validator
         $validator = Validator::make($request->all(),[
            // 'id_admin'=>'required',
            // 'nama'=>'required',
            'photo'=>'nullable|mimes:png,jpg,jpeg|max:2408',
            // 'email'=>'required|email',
            // 'jkelamin'=>'required|in:Laki-laki, Perempuan',
            // 'password'=>'required',   
            // 'alamat'=>'required',   
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
            
        }

        $user = Auth::user();
        // ambil nisn dari user

        $id_admin = $user->id_admin;
        $admin = Admin::where('id_admin', $id_admin)->first();
        $namaadmin = $admin->name;

        // Mengisi data admin dengan input dari form
        $admin->id_admin = $admin->id_admin;
        $admin->name = $request->nama;
        $admin->email = $request->email;
        $admin->alamat = $request->alamat;
        $admin->jenis_kelamin = $request->jkelamin;

        // Periksa apakah password baru diisi
        if($request->password){
            $admin->password = Hash::make($request->password);
        }

        $photo    = $request->file('photo');
        if($photo){
            if($admin->image){
                Storage::disk('public')->delete('photo-admin/'.$admin->image);
            }
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-admin/'.$filename;
    
            Storage::disk('public')->put($path,file_get_contents($photo));
            $admin['image']         = $filename;
        }
        // Simpan perubahan data
        if($admin->save()){
            // $datadmin = User::where('id_admin', $id_admin)->first();
            // $datadmin->name = $admin->name;
            // $datadmin->email = $admin->email;
            // $datadmin->save();

            return redirect()->route('profile')->with('success-edit-profile', 'Data Admin '.$namaadmin.' berhasil diedit');
        }else{
            return redirect()->route('profile')->with('fail', 'Data Admin gagal '.$namaadmin.' diedit');
        }
        //end siswa
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        // $user = $request->user();

        // Auth::logout();

        // $user->delete();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return Redirect::to('/');
    }

    // public function show()
    // {
    //     // Mendapatkan ID pengguna yang saat ini masuk
    //     $userId = Auth::id();

    //     // Mengambil data pengguna berdasarkan ID
    //     $user = Siswa::find($userId);

    //     // @dd($user);
    //     // exit;
    //     // Kemudian Anda dapat melewatkan data pengguna ke tampilan profil
    //     return view('data-profile', [
    //         'user' => $user,
    //         'title' => 'Data Profile'

    //     ]);
    // }
    // }
    public function show()
    {
    // ambil yang  login
    $user = Auth::user();

    // ambil nip dari user
    $nip = $user->nip;

    // jika nip ada/tidak kosong
    if (!empty($nip)) {
        // cari data guru berdasarkan nip
        $guru = Guru::where('nip', $nip)->first();

        // Jika data guru ketemu, balikin view dengan data guru
        if ($guru) {
            $jurusans = Jurusan::all();
            $mapels = MataPelajaran::all();
            return view('data-profile.profile-guru', [
                'guru' => $guru,
                'mapels' => $mapels,
                'jurusans' => $jurusans,
                'title' => 'Data Profile'
            ]);
        }
    }

    // kalo gak ada guru, coba cari siswa berdasarkan nisn
    $nisn = $user->nisn;
    
    if (!empty($nisn)) {
        // Jika nisn ada, cari data siswa berdasarkan nisn
        $siswa = Siswa::where('nisn', $nisn)->first();

        // kalo data siswa ketemu, balik ke view dengan data siswa
        if ($siswa) {
            $jurusans = Jurusan::all();
            return view('data-profile.profile-siswa', [
                'siswa' => $siswa,
                'jurusans' => $jurusans,
                'title' => 'Data Profile'
            ]);
        }
    }

    // kalo kaga ketemu di siswa, coba cari admin berdasarkan id_admin
    $id_admin = $user->id_admin;
    if (!empty($id_admin)) {
        // Jika id_admin ada, cari data admin berdasarkan id_admin
        $admin = Admin::where('id_admin', $id_admin)->first();

        // kalo data admin ketemu, kembalikan view dengan data admin
        if ($admin) {
            return view('data-profile.profile-admin', [
                'admin' => $admin,
                'title' => 'Data Profile'
            ]);
        }
    }

    // // ini buat kalo gak ketemu semuanya
    // return view('data-profile-empty', [
    //     'title' => 'Data Profile'
    // ]);
}
}
