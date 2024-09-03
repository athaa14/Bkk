<?php

namespace App\Exports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AlumniExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Alumni::all();
    }

    /**
     * Map data into the format required for export.
     *
     * @param \App\Models\Alumni $alumni
     * @return array
     */

    public function map($alumni): array
    {
        return [
            $alumni->nik,
            $alumni->nama_lengkap,
            $alumni->jenis_kelamin,
            $alumni->jurusan,
            $alumni->tahun_lulus,
            $alumni->foto,
        ];
    }

    /**
     * Return the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'NIK',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Jurusan',
            'Tahun Lulus',
            'Foto',
        ];
    }
}