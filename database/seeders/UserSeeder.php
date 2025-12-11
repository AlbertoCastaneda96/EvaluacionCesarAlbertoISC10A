<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Usuario administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('admin123'),
            ]
        );

        $admin->assignRole('admin');

        // Usuario normal
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Usuario Normal',
                'password' => bcrypt('user123'),
            ]
        );

        $user->assignRole('usuario');
    }
}
