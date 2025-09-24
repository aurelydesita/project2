<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class KategoriExport implements FromCollection, WithHeadings,WithTitle

{
    public function collection()
    {
        return Category::all(['id', 'name', 'created_at']);
    }

    public function headings(): array
    {
        return ['ID', 'Nama Kategori', 'Tanggal Dibuat'];
    }

       public function title(): string
    {
        return 'Kategori'; // nama sheet
}

}