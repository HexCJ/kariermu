<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) 
    {
        // jika datanya ada maka update data
        $existingUser = Siswa::where('nisn', $row['nisn'])->first();
        $user = User::where('nisn', $row['nisn'])->first();
        if ($existingUser) {
            // Update the existing user
            $existingUser->name = $row['nama'];
            $existingUser->email = $row['email'];
            $existingUser->password = Hash::make($row['password']);
            $existingUser->jenis_kelamin = $row['jenis_kelamin'];
            $existingUser->alamat = $row['alamat'];
            $existingUser->kelas = $row['kelas'];
            $existingUser->jurusan = $row['jurusan'];
            $existingUser->urutan_kelas = $row['urutan_kelas'];
            $existingUser->status = $row['status'];
            $existingUser->tahun_lulus = $row['tahun_lulus'];
            $existingUser->save();

            $user->nisn = $row['nisn'];
            $user->name = $row['nama'];
            $user->password = Hash::make($row['password']);
            $user->role = 'Siswa';
            $user->save();

            return null;
        }

        return new Siswa([
            'nisn' => $row['nisn'],
            'name'  => $row['nama'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan'],
            'urutan_kelas' => $row['urutan_kelas'],
            'status' => $row['status'],
            'tahun_lulus' => $row['tahun_lulus'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nisn' => 'required|unique:users,nisn',
        ];
    }
}
