<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id_admin' => '1111',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1'),
            'alamat' => 'Alamat Admin',
        ]);
        Admin::create([
            'id_admin' => '4444',
            'name' => 'Admin4',
            'email' => 'admin4@example.com',
            'password' => bcrypt('admin4'),
            'alamat' => 'Alamat Admin',
        ]);

        // Tambahkan data admin lainnya sesuai kebutuhan
    }
}
