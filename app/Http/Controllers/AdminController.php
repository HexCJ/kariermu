<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Admin::findOrFail($id);
        $namaadmin = $data->name;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Siswa '.$namaadmin.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Siswa gagal '.$namaadmin.' dihapus');
        }
    }
}
