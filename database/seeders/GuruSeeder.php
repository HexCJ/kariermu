<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;
use Spatie\Permission\Models\Role;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guru = Guru::updateOrCreate([
            'nip' => '11123',
            'name' => 'Jonathan',
            'email' => 'Jonathan@example.com',
            'password' => bcrypt('Jonathan1'),
            'alamat' => 'jl sawah balong',
            'jenis_kelamin' => 'Laki-laki',
            'mata_pelajaran' => 'BING', 
        ]);

        $guru = Guru::updateOrCreate([
            'nip' => '22234',
            'name' => 'cahyo',
            'email' => 'cahyo@example.com',
            'password' => bcrypt('Cahyo1'),
            'alamat' => 'jl sawah balong',
            'jenis_kelamin' => 'Laki-laki',
            'mata_pelajaran' => 'MTK', 
        ]);

        // Pastikan peran 'guru' sudah ada di basis data atau buat jika belum ada
        $role = Role::firstOrCreate(['name' => 'guru', 'guard_name' => 'guru']);

        // Memberikan peran 'guru' kepada guru yang telah dibuat dengan menggunakan guard 'guru'
        $guru->assignRole($role);
    }
}
