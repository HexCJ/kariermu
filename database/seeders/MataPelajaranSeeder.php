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
        // Menambahkan data mata pelajaran
        // for($i=0;$i<20;$i++){
        //     MataPelajaran::updateOrCreate([
        //         'id_mata_pelajaran' => 'MTK'.$i,
        //         'nama_mata_pelajaran' => 'Matematika'.$i,
        //     ]);
        // }

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

    }
}
  