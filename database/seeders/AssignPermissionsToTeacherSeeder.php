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

          // Obtener el rol 'profesor'
          $rolestudent = Role::findByName('estudiante');

          // Obtener el permiso 'teacher.dashboard'
          $permisoestudentDashboard = Permission::where('name', 'estudent.dashboard')->first();
  
          // Asignar el permiso al rol
          if ($rolestudent && $permisoestudentDashboard) {
              $rolestudent->givePermissionTo($permisoestudentDashboard);
          } else {
              if (!$rolestudent) {
                  $this->command->info('Rol "Estudiante" no encontrado.');
              }
              if (!$permisoestudentDashboard) {
                  $this->command->info('Permiso "estudent.dashboard" no encontrado.');
              }
          }
    }

    
}
