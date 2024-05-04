<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;


class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::updateOrCreate([
            'nisn' => '3333',
            'name' => 'siswa',
            'email' => 'siswa@example.com',
            'password' => bcrypt('siswa1'),
            'alamat' => 'rumah Siswa',
            // 'tahun_lulus' => '2022',
            'jenis_kelamin' => 'Laki-laki',
            'status' => 'Belum Lulus',
            'kelas' => 'X',
            'urutan_kelas' => '1',
            'jurusan' => 'RPL', // Ganti dengan id jurusan yang sesuai
        ]);
    }
}
