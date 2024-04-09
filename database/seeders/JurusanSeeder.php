<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;


class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Menambahkan data jurusan
                Jurusan::updateOrCreate([
                    'id_jurusan' => 'RPL',
                    'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                ]);
        
                Jurusan::updateOrCreate([
                    'id_jurusan' => 'DGM',
                    'nama_jurusan' => 'Desain Gambar Mesin',
                ]);

                Jurusan::updateOrCreate([
                    'id_jurusan' => 'DPIB',
                    'nama_jurusan' => 'Desain Permodelan dan Informasi Bangunan',
                ]);

                Jurusan::updateOrCreate([
                    'id_jurusan' => 'OT',
                    'nama_jurusan' => 'Teknik Otomasi Industri',
                ]);

                Jurusan::updateOrCreate([
                    'id_jurusan' => 'TITL',
                    'nama_jurusan' => 'Teknik Instalasi Tenaga Listrik',
                ]);
    }
}
