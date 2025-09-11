<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all(['id', 'name', 'email', 'created_at']);
    }

    public function headings(): array
    {
        return ['ID', 'Nama', 'Email', 'Tanggal Dibuat'];
}
}