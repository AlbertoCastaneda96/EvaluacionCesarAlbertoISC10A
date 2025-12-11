<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $super = Role::firstOrCreate(['name' => 'super_admin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $user  = Role::firstOrCreate(['name' => 'usuario']);

        // Asignar permisos
        $allPermissions = Permission::all();

        // super_admin obtiene todo
        $super->permissions()->sync($allPermissions->pluck('id')->toArray());

        // admin obtiene la mayoría (ej: todo menos quizás permisos críticos) — aquí le damos todo también por simplicidad
        $admin->permissions()->sync($allPermissions->pluck('id')->toArray());

        // usuario solo ver usuarios y ver roles/ permisos (ajusta según necesites)
        $usuarioPerms = Permission::whereIn('name', ['ver_usuarios','ver_roles','ver_permisos'])->get();
        $user->permissions()->sync($usuarioPerms->pluck('id')->toArray());
    }
}
