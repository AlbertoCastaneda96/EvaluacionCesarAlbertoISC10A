<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $usuario = Role::firstOrCreate(['name' => 'usuario']);

        // Asignar permisos
        $admin->givePermissionTo(Permission::all());

        $usuario->givePermissionTo([
            'ver usuarios',
        ]);
    }
}
