<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class KuliahExport implements FromCollection,WithStyles,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Laporan::join('siswa','siswa.nisn','=','laporan.nisn')
        ->select('laporan.nisn','siswa.name','siswa.kelas', 'siswa.jurusan','siswa.urutan_kelas','siswa.status as status siswa','siswa.tahun_lulus','laporan.status','laporan.tempat_kerja_kuliah')
        ->where('laporan.status','Kuliah')->get();
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama Lengkap',
            'Kelas',
            'Jurusan',
            'Urutan Kelas',
            'Status Siswa',
            'Tahun Lulus',
            'Status Karir',
            'Nama Universitas',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->getFont()->setBold(true);
        $sheet->getStyle('A:I')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
