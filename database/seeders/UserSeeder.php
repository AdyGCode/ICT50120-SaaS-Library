<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $seedUsers = [
            [
                'name' => 'Ad Ministrator',
                'email' => "ad.ministrator@example.com",
                'password' => 'Password1',
                'roles' => ['admin', 'member', 'staff'],
            ],
            [
                'name' => 'Annie Wun',
                'email' => "annie.wun@example.com",
                'password' => 'Password1',
                'roles' => ['member'],
            ],
            [
                'name' => 'Andy Mann',
                'email' => "andy.mann@example.com",
                'password' => 'Password1',
                'roles' => ['staff', 'member'],
            ],
        ];

        foreach ($seedUsers as $newUser) {
            $newUser['password'] = Hash::make($newUser['password']);
            $user = User::create([
                'name' => $newUser['name'],
                'email' => $newUser['email'],
                'password' => $newUser['password'],
            ]);

            foreach ($newUser['roles'] as $role) {
                $newRole = Role::whereName($role)->first();
                if (!is_null($newRole)) {
                    $permissions = Permission::pluck('id', 'id')->all();
                    $newRole->syncPermissions($permissions);
                    $user->assignRole([$newRole->id]);
                }
            }
        }
    }
}
