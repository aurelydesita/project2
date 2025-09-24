<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // bikin role
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $viewer = Role::firstOrCreate(['name' => 'viewer', 'guard_name' => 'web']);

        // kasih semua permission ke admin
        $admin->syncPermissions(Permission::all());

        // kasih permission terbatas ke editor
        $editor->syncPermissions([
            'kategori_read',
            'kategori_write',
            'kategori_create',
            'kategori_export',   
            'konten_read',
            'konten_write',
            'konten_create',
            'konten_export',
        ]);

        // viewer hanya bisa read
        $viewer->syncPermissions([
            'kategori_read',
            'konten_read',
        ]);
    }
}
