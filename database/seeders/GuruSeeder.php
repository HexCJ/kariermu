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
        // $guru = Guru::updateOrCreate([
        //     'nip' => '11123',
        //     'name' => 'Jonathan',
        //     'email' => 'Jonathan@example.com',
        //     'password' => bcrypt('Jonathan1'),
        //     'alamat' => 'jl sawah balong',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'mata_pelajaran' => 'BING', 
        // ]);

        // $guru = Guru::updateOrCreate([
        //     'nip' => '22234',
        //     'name' => 'cahyo',
        //     'email' => 'cahyo@example.com',
        //     'password' => bcrypt('Cahyo1'),
        //     'alamat' => 'jl sawah balong',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'mata_pelajaran' => 'MTK', 
        // ]);
        $guru = Guru::updateOrCreate([
            'nip' => '2222',
            'name' => 'guru',
            'email' => 'guru@example.com',
            'password' => bcrypt('guru1'),
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'rumah guru',
            'walikelas' => 'X',
            'jurusan' => 'RPL', // Ganti dengan id jurusan yang sesuai
            'urutan_kelas' => '1',
            'mata_pelajaran' => 'MTK', 
        ]);


    }
}
