<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'kategori_read',
            'kategori_write',
            'kategori_create',
            'kategori_delete',
            'konten_read',
            'konten_write',
            'konten_create',
            'konten_delete',
            'user_read',
            'user_create',
            'user_write',
            'user_delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }
    }
}
