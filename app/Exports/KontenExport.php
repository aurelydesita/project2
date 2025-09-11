<?php

namespace App\Exports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KontenExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Content::all(['id', 'title', 'body', 'category_id', 'user_id', 'created_at']);
    }

    public function headings(): array
    {
        return ['ID', 'Judul', 'Isi Konten', 'Kategori ID', 'User ID', 'Tanggal Dibuat'];
    }
}