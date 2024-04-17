<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jurusan::get();

        return view('data-kelas.data-kelas',compact('data'),[
            'title' => 'Data Jurusan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'id_jurusan'=>'required',
            'nama_jurusan'=>'required',

        ]);
        // jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        // terima dan kirim
            // terima dan kirim
            $data['id_jurusan'] = $request->id_jurusan;
            $data['nama_jurusan'] = $request->nama_jurusan;

            if(Jurusan::create($data)){
                //kembali
                return redirect()->route('data-kelas')->with('success', 'Data Jurusan berhasil ditambahkan');
            }else{
                return redirect()->route('data-kelas')->with('fail', 'Data Jurusan gagal ditambahkan');
            }
            
            //kembali
            // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editin
     * g the specified resource.
     */
    public function edit(Request $request, $id)
    {
    // $data = Jurusan::findOrFail($id);

    // return view('data-kelas.data-kelas', [
    //     'title' => 'Edit Data Jurusan',
    //     'data' => $data,
    // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        // dd($mapel);
        $nama_jurusan = $jurusan->nama_jurusan;

        if($jurusan->update([
            'id_jurusan'     => $request->id_jurusan,
            'nama_jurusan'   => $request->nama_jurusan
        ])){
            return redirect()->route('data-kelas')->with(['success-update' => 'Data Mata Pelajaran '.$nama_jurusan.' Berhasil DiUpdate!']);
        } else{
            return redirect()->route('data-kelas')->with(['fail' => 'Data Mata Pelajaran '.$nama_jurusan.' Gagal DiUpdate!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Redirect dengan pesan sukses
        $jurusan = Jurusan::findOrFail($id);
        // dd($mapel);
        $nama_jurusan = $jurusan->nama_jurusan;

        if($jurusan->delete()){
            return redirect()->route('data-kelas')->with(['success-delete' => 'Data Jurusan '.$nama_jurusan.' Berhasil Dihapus!']);
        }else {
            return redirect()->route('data-kelas')->with(['fail' => 'Data Jurusan '.$nama_jurusan.' Berhasil Dihapus!']);
        }
    }
}
