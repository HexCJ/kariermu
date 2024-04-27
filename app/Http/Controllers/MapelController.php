<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use Illuminate\View\View;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mapel(Request $request)
    {
        $data = MataPelajaran::all();
        return view('data-kelas.mapel', compact('data'),[
            'title'  => 'Data Mata Pelajaran'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):  RedirectResponse
    {

        $validator = Validator::make($request->all(),[
            'id_mapel'=>'required',   
            'nama_mapel'=>'required',   
            
        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $data['id_mata_pelajaran'] = $request->id_mapel;
        $data['nama_mata_pelajaran'] = $request->nama_mapel;

        if(MataPelajaran::create($data)){
            return redirect()->route('mapel')->with('success', 'Data Mapel berhasil ditambahkan');
        }else{
            return redirect()->route('mapel')->with('fail', 'Data Mapel gagal ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        // dd($mapel);
        $namamapel = $mapel->nama_mata_pelajaran;
        $mapel->update([
            'id_mata_pelajaran'     => $request->id_mapel,
            'nama_mata_pelajaran'   => $request->nama_mapel
        ]);
        if($mapel->update()){
            return redirect()->route('mapel')->with(['success-update' => 'Data Mata Pelajaran '.$namamapel.' Berhasil Diupdate!']);
        } else{
            return redirect()->route('mapel')->with(['fail' => 'Data Mata Pelajaran '.$namamapel.' Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        // dd($mapel);
        $namamapel = $mapel->nama_mata_pelajaran;
        if($mapel->delete()){
            return redirect()->route('mapel')->with(['success-delete' => 'Data Mata Pelajaran '.$namamapel.' Berhasil Dihapus!']);
        }
    }
}
