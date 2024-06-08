<?php

namespace App\Imports;

use App\Models\guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // jika datanya ada maka update data
        $existingUser = Guru::where('nip', $row[0])->first();
        $user = User::where('nip', $row[0])->first();
        if ($existingUser) {
            $existingUser->nip = $row[0];
            $existingUser->name = $row[1];
            $existingUser->email = $row[2];
            $existingUser->password = Hash::make($row[3]);
            $existingUser->jenis_kelamin = $row[4];
            $existingUser->alamat = $row[5];
            $existingUser->mata_pelajaran= $row[6];
            $existingUser->walikelas = $row[7];
            $existingUser->jurusan = $row[8];
            $existingUser->urutan_kelas = $row[9];
            $existingUser->save();

            $user->nip = $row[0];
            $user->name = $row[1];
            $user->password = Hash::make($row[3]);
            $user->password = 'Guru';
            $user->save();

            return null;
        }
        return new guru([
            'nip' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'password' => Hash::make($row[3]),
            'jenis_kelamin' => $row[4],
            'alamat' => $row[5],
            'mata_pelajaran'=> $row[6],
            'walikelas' => $row[7],
            'jurusan' => $row[8],
            'urutan_kelas' => $row[9],
        ]);
    }

    public function rules(): array
    {
        return [
            'nisn' => 'required|unique:users,nisn',
        ];
    }
}
