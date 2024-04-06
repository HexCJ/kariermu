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
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin1')
        ]);
        //buat role sesuai RolePermission
        $admin->assignRole('admin');

        $penulis = User::updateOrCreate([
            'name'=>'penulis',
            'email'=>'penulis@gmail.com',
            'password'=>bcrypt('penulis1')
        ]);
        //buat role sesuai RolePermission
        $penulis->assignRole('penulis');

        $siswa = User::updateOrCreate([
            'name'=>'siswa',
            'email'=>'siswa@gmail.com',
            'password'=>bcrypt('siswa1')
        ]);
        //buat role sesuai RolePermission
        $siswa->assignRole('siswa');
    }
}
