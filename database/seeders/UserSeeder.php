<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurarse que existe rol super_admin
        $super = Role::firstOrCreate(['name' => 'super_admin']);

        $sa = User::firstOrCreate(
            ['email' => 'sa@example.com'],
            [
                'name' => 'sa',
                'password' => Hash::make('12345678'),
                'role_id' => $super->id,
            ]
        );

        // Puedes crear más usuarios si quieres
        $adminRole = Role::where('name','admin')->first();
        if ($adminRole) {
            User::firstOrCreate(
                ['email' => 'admin@example.com'],
                [
                    'name' => 'Administrador',
                    'password' => Hash::make('admin123'),
                    'role_id' => $adminRole->id,
                ]
            );
        }
    }
}
