<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissionsToTeacherSeeder extends Seeder
{
    public function run()
    {
        // Obtener el rol 'profesor'
        $rolProfesor = Role::findByName('profesor');

        // Obtener el permiso 'teacher.dashboard'
        $permisoTeacherDashboard = Permission::where('name', 'teacher.dashboard')->first();

        // Asignar el permiso al rol
        if ($rolProfesor && $permisoTeacherDashboard) {
            $rolProfesor->givePermissionTo($permisoTeacherDashboard);
        } else {
            if (!$rolProfesor) {
                $this->command->info('Rol "profesor" no encontrado.');
            }
            if (!$permisoTeacherDashboard) {
                $this->command->info('Permiso "teacher.dashboard" no encontrado.');
            }
        }
    }
}
