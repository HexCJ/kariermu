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
        Admin::updateOrCreate([
            'id_admin' => '1111',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1'),
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Alamat Admin',
        ]);
        // Tambahkan data admin lainnya sesuai kebutuhan
    }
}
