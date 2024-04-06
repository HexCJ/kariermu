<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //permission
        //buat role permission dan fitur
        //fitur
        Permission::updateOrCreate(['name' => 'tambah-user']);
        Permission::updateOrCreate(['name' => 'edit-user']);
        Permission::updateOrCreate(['name' => 'hapus-user']);
        Permission::updateOrCreate(['name' => 'lihat-user']);

        Permission::updateOrCreate(['name' => 'tambah-tulisan']);
        Permission::updateOrCreate(['name' => 'edit-tulisan']);
        Permission::updateOrCreate(['name' => 'hapus-tulisan']);
        Permission::updateOrCreate(['name' => 'lihat-tulisan']);

        //role
        Role::updateOrCreate(['name' => 'admin']);
        Role::updateOrCreate(['name' => 'penulis']);
        Role::updateOrCreate(['name' => 'siswa']);

        //memberi fitur untuk role admin
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        //memberi fitur untuk role penulis
        $rolePenulis = Role::findByName('penulis');
        $rolePenulis->givePermissionTo('tambah-tulisan');
        $rolePenulis->givePermissionTo('edit-tulisan');
        $rolePenulis->givePermissionTo('hapus-tulisan');
        $rolePenulis->givePermissionTo('lihat-tulisan');

        $roleSiswa = Role::findByName('siswa');
        $roleSiswa->givePermissionTo('lihat-tulisan');


        
    }
}
