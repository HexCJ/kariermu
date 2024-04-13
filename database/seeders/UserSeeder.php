<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     //buat user dan jalankan seeder 
    public function run(): void
    {
        $admin = User::updateOrCreate([
            'nisn'=>'5001',
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'alamat'=>'rumah admin',
            'tahun_lulus'=>'2000',
            'jenis_kelamin'=>'Laki-laki',
            'status'=>'Lulus',
            'kelas'=>'Lulus',
            'jurusan'=>'RPL',
            'password'=>bcrypt('admin1')
        ]);
        //buat role sesuai RolePermission
        $admin->assignRole('admin');

        // $penulis = User::updateOrCreate([
        //     'nisn'=>'5002',
        //     'name'=>'penulis',
        //     'email'=>'penulis@gmail.com',
        //     'alamat'=>'rumah penulis',
        //     'tahun_lulus'=>'2000',
        //     'jenis_kelamin'=>'Perempuan',
        //     'status'=>'Lulus',
        //     'kelas'=>'Lulus',
        //     'jurusan'=>'DPIB',
        //     'password'=>bcrypt('penulis1')
        // ]);
        // //buat role sesuai RolePermission
        // $penulis->assignRole('penulis');

        // $siswa = User::updateOrCreate([
        //     'nisn'=>'5003',
        //     'name'=>'siswa',
        //     'email'=>'siswa@gmail.com',
        //     'alamat'=>'rumah siswa',
        //     'tahun_lulus'=>'2025',
        //     'jenis_kelamin'=>'Laki-laki',
        //     'status'=>'Belum Lulus',
        //     'kelas'=>'XI',
        //     'jurusan'=>'OT',
        //     'password'=>bcrypt('siswa1')
        // ]);
        // //buat role sesuai RolePermission
        // $siswa->assignRole('siswa');

        // for($i=0; $i<10; $i++){
        //     $siswa = User::updateOrCreate([
        //         'nisn'=>'501'.$i,
        //         'name'=>'Cahyo Ok'.$i,
        //         'email'=>'cahyo'.$i.'@gmail.com',
        //         'alamat'=>'rumah siswa',
        //         'tahun_lulus'=>'2025',
        //         'jenis_kelamin'=>'Laki-laki',
        //         'status'=>'Belum Lulus',
        //         'kelas'=>'XI',
        //         'jurusan'=>'OT',
        //         'password'=>bcrypt('siswa1')
        //     ]);
        //     //buat role sesuai RolePermission
        //     $siswa->assignRole('siswa');
        // }

        // for($i=0;$i<5000;$i++){
        //     $siswa = User::updateOrCreate([
        //         'nisn'=>''.$i,
        //         'name'=>'siswa'.$i,
        //         'email'=>'siswa'.$i.'@gmail.com',
        //         'alamat'=>'rumah siswa',
        //         'tahun_lulus'=>'2025',
        //         'jenis_kelamin'=>'Laki-laki',
        //         'status'=>'Belum Lulus',
        //         'kelas'=>'XI',
        //         'jurusan'=>'OT',
        //         'password'=>bcrypt('siswa'.$i)
        //     ]);
        //     //buat role sesuai RolePermission
        //     $siswa->assignRole('siswa');
        // }
    }
}
