<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan semua permission sudah ada
        $permissions = [
            'kategori_read', 'kategori_write', 'kategori_create', 'kategori_delete','kategori_export',
            'konten_read', 'konten_write', 'konten_create', 'konten_delete','konten_export',
            'user_read', 'user_write', 'user_create', 'user_delete',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Buat role admin & kasih semua permission
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->syncPermissions(Permission::all());
    }
}