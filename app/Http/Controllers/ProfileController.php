<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\User;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Admin;
use App\Models\Guru;
use App\Models\Jurusan;
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //siswa
        
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
        // $user = Auth::user();
        // $data = Siswa::find('nisn');
        
        // $nisn = $user->nisn;
        // $siswa = Siswa::where('nisn', $nisn)->first();
        $nisn = Auth::user()->nisn;
        
        // Ambil data siswa berdasarkan NISN pengguna yang sedang login
        $siswa = Siswa::where('nisn', $nisn)->first();        
        $namasiswa = $siswa->name;
        
        // Mengisi data/siswa dengan input dari form
        $siswa->nisn = $request->nisn;
        $siswa->name = $request->nama;
        $siswa->jenis_kelamin = $request->jkelamin;
        $siswa->jurusan = $request->jurusan;
        $siswa->kelas = $request->kelas;
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
            $filename = date('Y-m-d').$photo->getClientOriginalName();
            $path     = 'photo-user/'.$filename;
            
            Storage::disk('public')->put($path,file_get_contents($photo));
            $data['image']         = $filename;
            
            
        }
        dd($request->all());
    
        // Simpan perubahan data
        if($siswa->save()){
            return redirect()->route('profile')->with('success-update', 'Data Siswa '.$namasiswa.' berhasil diedit');
        }else{
            return redirect()->route('profile')->with('fail', 'Data Siswa gagal '.$namasiswa.' diedit');
        }
        //end siswa
        
        
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
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
        $matapelajarans = MataPelajaran::all();


        // Jika data guru ketemu, balikin view dengan data guru
        if ($guru) {
            return view('data-profile', [
                'guru' => $guru,
                'matapelajarans' => $matapelajarans,
                'title' => 'Data Profile'
            ]);
        }
    }

    // kalo gak ada guru, coba cari siswa berdasarkan nisn
    $nisn = $user->nisn;
    if (!empty($nisn)) {
        // Jika nisn ada, cari data siswa berdasarkan nisn
        $siswa = Siswa::where('nisn', $nisn)->first();
        $jurusans = Jurusan::all();
        // kalo data siswa ketemu, balik ke view dengan data siswa
        if ($siswa) {
            return view('data-profile', [
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
            return view('data-profile', [
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
