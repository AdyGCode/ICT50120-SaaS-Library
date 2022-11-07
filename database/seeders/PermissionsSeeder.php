<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-browse', 'role-read', 'role-edit', 'role-add', 'role-delete',
            'permission-browse', 'permission-read', 'permission-edit', 'permission-add', 'permission-delete',
            'author-browse', 'author-read', 'author-edit', 'author-add', 'author-delete',
            'user-browse', 'user-read', 'user-read-own', 'user-edit', 'user-edit-own', 'user-add', 'user-delete',
            'book-browse', 'book-read', 'book-edit', 'book-add', 'book-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
