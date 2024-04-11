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

            
            //create
            Jurusan::create($data);
            //kembali
            return redirect()->route('data-kelas');
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
        // //
        // $data = Jurusan::find($id);

        // $data->id_jurusan = $request->id_jurusan;
        // $data->nama_jurusan = $request->nama_jurusan;
        // $data->save();
    
        // return redirect()->route('data-kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Cari data berdasarkan ID
    $jurusan = Jurusan::findOrFail($id);

    // Hapus data
    $jurusan->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('data-kelas')->with('success', 'Jurusan berhasil dihapus');
}
}
