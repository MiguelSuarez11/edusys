<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un permiso
        Permission::create([
            'name' => 'admin.usuarios.index',
            'description' => 'Ver Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.usuarios.edit',
            'description' => 'Editar Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.usuarios.destroy',
            'description' => 'Eliminar Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.personal.index',
            'description' => 'Ver Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.personal.create',
            'description' => 'Crear Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.personal.edit',
            'description' => 'Editar Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.personal.store',
            'description' => 'guardar Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.personal.update',
            'description' => 'Actualizar Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.personal.show',
            'description' => 'Ver Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.personal.destroy',
            'description' => 'Eliminar Personal',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.index',
            'description' => 'Ver Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.create',
            'description' => 'Crear Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.edit',
            'description' => 'Editar Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.destroy',
            'description' => 'Eliminar Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.index',
            'description' => 'Ver Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.create',
            'description' => 'Crear Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.edit',
            'description' => 'Editar Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.destroy',
            'description' => 'Eliminar Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.asignaturas.index',
            'description' => 'Ver Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.asignaturas.create',
            'description' => 'Crear Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.asignaturas.edit',
            'description' => 'Editar Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.asignaturas.destroy',
            'description' => 'Eliminar Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.dashboard',
            'description' => 'Dashboard Administrador',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'estudent.dashboard',
            'description' => 'Dashboard Estudiante',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'teacher.dashboard',
            'description' => 'Dashboard Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.notas.index',
            'description' => 'Ver Notas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.notas.create',
            'description' => 'crear Notas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.notas.store',
            'description' => 'guardar Notas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.notas.edit',
            'description' => 'editar Notas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.notas.update',
            'description' => 'actualizar Notas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.notas.destroy',
            'description' => 'eliminar Notas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.citas.index',
            'description' => 'Ver Citas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.citas.create',
            'description' => 'crear citas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.citas.store',
            'description' => 'guardar citas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.citas.edit',
            'description' => 'editar citas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.citas.update',
            'description' => 'actualizar citas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.citas.destroy',
            'description' => 'eliminar citas Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.asistencia.index',
            'description' => 'Ver asistencia Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.asistencia.create',
            'description' => 'crear asistencia Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.asistencia.store',
            'description' => 'guardar asistencia Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.asistencia.edit',
            'description' => 'editar asistencia Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.asistencia.update',
            'description' => 'actualizar asistencia Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'profesor.asistencia.destroy',
            'description' => 'eliminar asistencia Profesores',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
    }
}
