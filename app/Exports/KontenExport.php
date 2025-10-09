<?php

namespace App\Exports;

use App\Models\Content;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class KontenExport implements FromCollection, WithHeadings, WithTitle
{
    private $contents;

    public function __construct()
    {
        $user = Auth::user();

        // kalau admin: semua konten
        // kalau user biasa: hanya konten miliknya
        if ($user->hasRole('admin')) {
            $this->contents = Content::with(['category', 'user'])->get();
        } else {
            $this->contents = Content::with(['category', 'user'])
                ->where('user_id', $user->id)
                ->get();
        }
    }

    public function collection()
    {
        return $this->contents->map(function ($content) {
            return [
                'ID'         => $content->id,
                'Judul'      => $content->title,
                'Isi Konten' => $content->body,
                'Kategori'   => $content->category ? $content->category->name : '-',
                'User'       => $content->user ? $content->user->name : '-',
                'Tanggal'    => $content->created_at->format('Y-m-d H:i'),
                'Gambar'     => $content->image 
                    ? asset('storage/' . $content->image)  // ubah jadi URL link gambar
                    : '-',
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Judul', 'Isi Konten', 'Kategori', 'User', 'Tanggal Dibuat', 'Link Gambar'];
    }

    public function title(): string
    {
        return 'Konten';
    }
}
