<?php

namespace App\Exports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class KontenExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping, WithTitle
{
    public function collection()
    {
        return Content::with(['category', 'user'])->get();
    }

    public function map($content): array
    {
        return [
            $content->id,
            $content->title,
            $content->body,
            $content->category ? $content->category->name : '-',
            $content->user ? $content->user->name : '-',
            $content->image ? asset('storage/' . $content->image) : '-',
            $content->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Judul',
            'Isi Konten',
            'Kategori',
            'User',
            'Link Gambar',
            'Tanggal Dibuat',
        ];
    }

    public function title(): string
    {
        return 'Konten'; // nama sheet
    }
}
