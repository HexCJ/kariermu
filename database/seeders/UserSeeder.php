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
        // $admin = User::updateOrCreate([
        //     'nisn'=>'1',
        //     'name'=>'admin',
        //     'email'=>'admin123@gmail.com',
        //     'alamat'=>'rumah admin',
        //     'tahun_lulus'=>'2000',
        //     'jenis_kelamin'=>'Laki-laki',
        //     'status'=>'Lulus',
        //     'kelas'=>'Lulus',
        //     'jurusan'=>'RPL',
        //     'password'=>bcrypt('1')
        // ]);
        // //buat role sesuai RolePermission
        // $admin->assignRole('admin');

        // $penulis = User::updateOrCreate([
        //     'nisn'=>'5002',
        //     'name'=>'guru',
        //     'email'=>'guru@gmail.com',
        //     'alamat'=>'rumah guru',
        //     'tahun_lulus'=>'2000',
        //     'jenis_kelamin'=>'Perempuan',
        //     'status'=>'Lulus',
        //     'kelas'=>'Lulus',
        //     'jurusan'=>'DPIB',
        //     'password'=>bcrypt('guru1')
        // ]);
        // //buat role sesuai RolePermission
        // $guru->assignRole('guru');

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

        // $siswa = User::updateOrCreate([
        //     'nisn'=>'3333',
        //     'name'=>'siswa',
        //     // 'email' => 'siswa@example.com',
        // //     // 'alamat'=>'rumah guru',
        // //     // 'tahun_lulus'=>'2025',
        // //     // 'jenis_kelamin'=>'Laki-laki',
        // //     // 'status'=>'Belum Lulus',
        // //     // 'kelas'=>'XI',
        // //     // 'jurusan'=>'OT',
        //     'role'=>'Siswa',
        //     'password'=>bcrypt('siswa1')
        // ]);
        // // //buat role sesuai RolePermission
        // $siswa->assignRole('siswa');

        $admin = User::updateOrCreate([
            'id_admin'=>'1111',
            'name'=>'admin',
            // 'email' => 'admin@example.com',
        //     // 'alamat'=>'rumah guru',
        //     // 'tahun_lulus'=>'2025',
        //     // 'jenis_kelamin'=>'Laki-laki',
        //     // 'status'=>'Belum Lulus',
        //     // 'kelas'=>'XI',
        //     // 'jurusan'=>'OT',
            'role'=>'Admin',
            'password'=>bcrypt('admin1')
        ]);
        // //buat role sesuai RolePermission
        $admin->assignRole('admin');

        // $guru = User::updateOrCreate([
        //     'nip'=>'2222',
        //     'name'=>'guru',
        //     // 'email' => 'guru@example.com',
        // //     // 'alamat'=>'rumah guru',
        // //     // 'tahun_lulus'=>'2025',
        // //     // 'jenis_kelamin'=>'Laki-laki',
        // //     // 'status'=>'Belum Lulus',
        // //     // 'kelas'=>'XI',
        // //     // 'jurusan'=>'OT',
        //     'role'=>'Guru',
        //     'password'=>bcrypt('guru1')
        // ]);
        // // //buat role sesuai RolePermission
        // $guru->assignRole('guru');
        }
        
}
