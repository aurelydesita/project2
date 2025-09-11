<?php

namespace App\Exports;

use App\Exports\KontenExport;
use App\Exports\KategoriExport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Konten'   => new KontenExport(),
            'Kategori' => new KategoriExport(),
            'User'     => new UserExport(),
        ];
    }
}