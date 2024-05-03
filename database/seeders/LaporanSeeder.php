<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data laporan
        // Laporan::updateOrCreate([
        //     // 'nisn' => '1', 
        //     // 'status' => 'Bekerja',
        //     // 'tempat_kerja_kuliah' => 'Sekolah', // Isi jika diperlukan
        // ]);

        // Laporan::updateOrCreate([
        //     'nisn' => '5003', // Ganti dengan NISN yang sesuai
        //     'status' => 'Kuliah',
        //     'tempat_kerja_kuliah' => 'UI', // Isi jika diperlukan
        // ]);

        Laporan::updateOrCreate([
            'nisn' => '3333', // Ganti dengan NISN yang sesuai
            'status' => 'Kuliah',
            'name' => 'siswa',
            'jurusan' => 'RPL', // Ganti dengan id jurusan yang sesuai
            'tempat_kerja_kuliah' => 'UI', // Isi jika diperlukan
        ]);

        // Tambahkan data laporan lainnya sesuai kebutuhan
    }
}
