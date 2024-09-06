<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan data semester
        Semester::updateOrCreate([
            'id_semester' => 'S1',
            'semester_ke' => '1',
        ]);

        Semester::updateOrCreate([
            'id_semester' => 'S2',
            'semester_ke' => '2',
        ]);
        Semester::updateOrCreate([
            'id_semester' => 'S3',
            'semester_ke' => '3',
        ]);
        Semester::updateOrCreate([
            'id_semester' => 'S4',
            'semester_ke' => '4',
        ]);
        Semester::updateOrCreate([
            'id_semester' => 'S5',
            'semester_ke' => '5',
        ]);
        Semester::updateOrCreate([
            'id_semester' => 'S6',
            'semester_ke' => '6',
        ]);

        // Tambahkan data semester lainnya sesuai kebutuhan
    }
}
