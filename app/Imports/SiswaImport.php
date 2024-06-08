<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // jika datanya ada maka update data
        $existingUser = Siswa::where('nisn', $row[0])->first();
        $user = User::where('nisn', $row[0])->first();
        if ($existingUser) {
            // Update the existing user
            $existingUser->name = $row[1];
            $existingUser->email = $row[2];
            $existingUser->password = Hash::make($row[3]);
            $existingUser->jenis_kelamin = $row[4];
            $existingUser->alamat = $row[5];
            $existingUser->kelas = $row[6];
            $existingUser->jurusan = $row[7];
            $existingUser->urutan_kelas = $row[8];
            $existingUser->status = $row[9];
            $existingUser->tahun_lulus = $row[10];
            $existingUser->save();

            $user->nisn = $row[0];
            $user->name = $row[1];
            $user->password = Hash::make($row[3]);
            $user->password = 'Siswa';
            $user->save();

            return null;
        }

        return new Siswa([
            'nisn' => $row[0],
            'name'  => $row[1],
            'email' => $row[2],
            'password' => Hash::make($row[3]),
            'jenis_kelamin' => $row[4],
            'alamat' => $row[5],
            'kelas' => $row[6],
            'jurusan' => $row[7],
            'urutan_kelas' => $row[8],
            'status' => $row[9],
            'tahun_lulus' => $row[10],
        ]);
    }

    public function rules(): array
    {
        return [
            'nisn' => 'required|unique:users,nisn',
        ];
    }
}
