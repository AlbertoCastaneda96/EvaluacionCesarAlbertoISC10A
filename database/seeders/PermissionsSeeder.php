<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            'ver usuarios',
            'crear usuarios',
            'editar usuarios',
            'eliminar usuarios',

            'ver roles',
            'crear roles',
            'editar roles',
            'eliminar roles',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }
    }
}
