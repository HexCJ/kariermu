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
            'status'=>'aktif',
            'jenis_kelamin'=>'Laki-laki',
            'keinginan_setelah_lulus'=>'menjadi admin',
            'password'=>bcrypt('admin1')
        ]);
        //buat role sesuai RolePermission
        $admin->assignRole('admin');

        $penulis = User::updateOrCreate([
            'nisn'=>'2222',
            'name'=>'penulis',
            'email'=>'penulis@gmail.com',
            'alamat'=>'rumah penulis',
            'status'=>'tidak aktif',
            'jenis_kelamin'=>'Perempuan',
            'keinginan_setelah_lulus'=>'menjadi penulis',
            'password'=>bcrypt('penulis1')
        ]);
        //buat role sesuai RolePermission
        $penulis->assignRole('penulis');

        $siswa = User::updateOrCreate([
            'nisn'=>'3333',
            'name'=>'siswa',
            'email'=>'siswa@gmail.com',
            'alamat'=>'rumah siswa',
            'status'=>'aktif',
            'jenis_kelamin'=>'Laki-laki',
            'keinginan_setelah_lulus'=>'menjadi mahasiswa',
            'password'=>bcrypt('siswa1')
        ]);
        //buat role sesuai RolePermission
        $siswa->assignRole('siswa');
    }
}
