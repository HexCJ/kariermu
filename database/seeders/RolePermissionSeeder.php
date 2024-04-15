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
        Role::updateOrCreate(['name' => 'siswa']);
        Role::updateOrCreate(['name' => 'guru']);

        //memberi fitur untuk role admin
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');
        $roleAdmin->givePermissionTo('tambah-tulisan');
        $roleAdmin->givePermissionTo('edit-tulisan');
        $roleAdmin->givePermissionTo('hapus-tulisan');
        $roleAdmin->givePermissionTo('lihat-tulisan');
        

        //memberi fitur untuk role Guru
        $roleGuru = Role::findByName('guru');
        $roleGuru->givePermissionTo('tambah-tulisan');
        $roleGuru->givePermissionTo('edit-tulisan');
        $roleGuru->givePermissionTo('hapus-tulisan');
        $roleGuru->givePermissionTo('lihat-tulisan');
        

        $roleSiswa = Role::findByName('siswa');
        $roleSiswa->givePermissionTo('lihat-tulisan');


        
    }
}
