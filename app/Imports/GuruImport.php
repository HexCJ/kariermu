<?php

namespace App\Imports;

use App\Models\guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // jika datanya ada maka update data
        $existingUser = Guru::where('nip', $row['nip'])->first();
        $user = User::where('nip', $row['nip'])->first();
        if ($existingUser) {
            $existingUser->nip = $row['nip'];
            $existingUser->name = $row['nama'];
            $existingUser->email = $row['email'];
            $existingUser->password = Hash::make($row['password']);
            $existingUser->jenis_kelamin = $row['jenis_kelamin'];
            $existingUser->alamat = $row['alamat'];
            $existingUser->mata_pelajaran= $row['mata_pelajaran'];
            $existingUser->walikelas = $row['walikelas'];
            $existingUser->jurusan = $row['jurusan'];
            $existingUser->urutan_kelas = $row['urutan_kelas'];
            $existingUser->save();

            $user->nip = $row['nip'];
            $user->name = $row['nama'];
            $user->password = Hash::make($row['password']);
            $user->role = 'Guru';
            $user->save();

            return null;
        }
        return new Guru([
            'nip' => $row['nip'],
            'name' => $row['nama'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'mata_pelajaran'=> $row['mata_pelajaran'],
            'walikelas' => $row['walikelas'],
            'jurusan' => $row['jurusan'],
            'urutan_kelas' => $row['urutan_kelas'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nip' => 'required|unique:users,nip',
        ];
    }
}
