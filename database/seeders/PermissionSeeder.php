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
            // kategori
            'kategori_read',
            'kategori_write',
            'kategori_create',
            'kategori_delete',
            'kategori_export',

            // konten
            'konten_read',
            'konten_write',
            'konten_create',
            'konten_delete',
            'konten_export',

            // user
            'user_read',
            'user_write',
            'user_create',
            'user_delete',
            'user_export',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name'       => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
