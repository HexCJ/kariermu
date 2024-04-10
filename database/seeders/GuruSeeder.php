<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::updateOrCreate([
            'nip' => '11123',
            'name' => 'Jonathan',
            'email' => 'Jonathan@example.com',
            'password' => bcrypt('Jonathan1'),
            'alamat' => 'jl sawah balong',
            'jenis_kelamin' => 'Laki-laki',
            'mata_pelajaran' => 'BING', 
        ]);

        Guru::updateOrCreate([
            'nip' => '22234',
            'name' => 'cahyo',
            'email' => 'cahyo@example.com',
            'password' => bcrypt('Cahyo1'),
            'alamat' => 'jl sawah balong',
            'jenis_kelamin' => 'Laki-laki',
            'mata_pelajaran' => 'MTK', 
        ]);
    }
}
