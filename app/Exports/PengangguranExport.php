<?php

namespace App\Exports;
use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PengangguranExport implements FromCollection,WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Laporan::join('siswa','siswa.nisn','=','laporan.nisn')
        ->select('laporan.nisn','siswa.name','siswa.kelas', 'siswa.jurusan','siswa.urutan_kelas','siswa.status as status siswa','siswa.tahun_lulus','laporan.status')
        ->where('laporan.status','Menganggur')->get();
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
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // size sesuai value
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    }
}
