<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'BI',
            'nama_mata_pelajaran' => 'Bahasa Indonesia',
        ]);

        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'MTK',
            'nama_mata_pelajaran' => 'Matematika',
        ]);

        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'SI',
            'nama_mata_pelajaran' => 'Sejarah Indonesia',
        ]);

        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'BING',
            'nama_mata_pelajaran' => 'Bahasa Inggris',
        ]);

        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'PAI',
            'nama_mata_pelajaran' => 'Pendidikan Agama Islam',
        ]);
        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'IPAS',
            'nama_mata_pelajaran' => 'Ilmu Pengetahuan Alam dan Sosial',
        ]);
        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'SB',
            'nama_mata_pelajaran' => 'Seni Budaya',
        ]);
        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'PKN',
            'nama_mata_pelajaran' => 'Pendidikan Kewarganegaraan',
        ]);
        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'PJOK',
            'nama_mata_pelajaran' => 'Pendidikan Jasmani dan Olahraga',
        ]);
        MataPelajaran::updateOrCreate([
            'id_mata_pelajaran' => 'KEJURUAN',
            'nama_mata_pelajaran' => 'Mata Pelajaran Jurusan',
        ]);

    }
}
  