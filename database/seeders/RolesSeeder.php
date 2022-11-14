<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin',
                'permissions' => [
                    'author-browse', 'author-read', 'author-edit', 'author-add', 'author-delete',
                    'book-browse', 'book-read', 'book-edit', 'book-add', 'book-delete',
//                    'genre-browse', 'genre-read', 'genre-edit', 'genre-add', 'genre-delete',
                    'permission-browse', 'permission-read', 'permission-edit', 'permission-add', 'permission-delete',
                    'role-browse', 'role-read', 'role-edit', 'role-add', 'role-delete',
                    'user-browse', 'user-read', 'user-read-own', 'user-edit', 'user-edit-own', 'user-add', 'user-delete',
                ]
            ],
            ['name' => 'staff',
                'permissions' => [
                    'author-browse', 'author-add', 'author-edit', 'author-delete',
                    'book-add', 'book-edit', 'book-delete',
//                    'genre-browse', 'genre-read', 'genre-edit', 'genre-add', 'genre-delete',
                    'user-browse', 'user-add', 'user-edit', 'book-browse',
                ]
            ],
            ['name' => 'member',
                'permissions' => [
                    'author-browse', 'author-read',
                    'book-browse', 'book-read',
//                    'genre-browse', 'genre-read',
                    'user-read-own', 'user-edit-own',
                ]
            ],
            ['name' => 'guest',
                'permissions' => [
                    'author-browse', 'author-read',
                    'book-browse', 'book-read',
//                    'genre-browse', 'genre-read',
                ]],
        ];


        foreach ($roles as $role) {
            $newRole = Role::create(['name' => $role['name']]);
            $permissions = $role['permissions'];
            foreach ($permissions as $permission) {
                $newRole->givePermissionTo($permission);
            }
        }

    }
}
