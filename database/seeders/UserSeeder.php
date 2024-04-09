<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     //buat user dan jalankan seeder 
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'nisn'=>'1111',
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'alamat'=>'rumah admin',
            'jenis_kelamin'=>'Laki-laki',
            'status'=>'Lulus',
            'kelas'=>'Lulus',
            'jurusan'=>'RPL',
            'password'=>bcrypt('admin1')
        ]);
        //buat role sesuai RolePermission
        $admin->assignRole('admin');

        $penulis = User::updateOrCreate([
            'nisn'=>'2222',
            'name'=>'penulis',
            'email'=>'penulis@gmail.com',
            'alamat'=>'rumah penulis',
            'jenis_kelamin'=>'Perempuan',
            'status'=>'Lulus',
            'kelas'=>'Lulus',
            'jurusan'=>'DPIB',
            'password'=>bcrypt('penulis1')
        ]);
        //buat role sesuai RolePermission
        $penulis->assignRole('penulis');

        $siswa = User::updateOrCreate([
            'nisn'=>'3333',
            'name'=>'siswa',
            'email'=>'siswa@gmail.com',
            'alamat'=>'rumah siswa',
            'jenis_kelamin'=>'Laki-laki',
            'status'=>'Belum Lulus',
            'kelas'=>'XI',
            'jurusan'=>'OT',
            'password'=>bcrypt('siswa1')
        ]);
        //buat role sesuai RolePermission
        $siswa->assignRole('siswa');
    }
}
