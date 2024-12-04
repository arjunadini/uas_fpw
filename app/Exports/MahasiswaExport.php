<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Mahasiswa::all(); // Mengambil seluruh data mahasiswa
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'NPM',
            'Nama',
            'Program Studi',
            'Created At',
            'Updated At',
        ];
    }
}
