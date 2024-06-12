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

        // PERMISOS DE USUARIOS
        Permission::create([
            'name' => 'admin.usuarios.index',
            'description' => 'Ver Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.usuarios.create',
            'description' => 'Crear Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.usuarios.store',
            'description' => 'Guardar Usuarios',
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
            'name' => 'admin.usuarios.update',
            'description' => 'Actualizar Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.usuarios.show',
            'description' => 'Ver Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.usuarios.destroy',
            'description' => 'Eliminar Usuarios',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        // PERMISOS DE PERSONAL
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

        ///////////////////////////////////////

        // PERMISO DE CURSOS
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
            'name' => 'admin.cursos.store',
            'description' => 'Guardar Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.update',
            'description' => 'Actualizar Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.show',
            'description' => 'Ver Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.cursos.destroy',
            'description' => 'Eliminar Cursos',
            'guard_name' => 'web',
            'estado' => 1,
        ]);



        //////////////////////////////////////////////////////

        // PERMISO DE ROLES
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
            'name' => 'admin.rol.store',
            'description' => 'Guardar Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.update',
            'description' => 'Actualizar Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.show',
            'description' => 'Ver Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.rol.destroy',
            'description' => 'Eliminar Roles',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        ///////////////////////////////////////////////////

        // PERMISO DE ASIGNATURAS

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
            'name' => 'admin.asignaturas.store',
            'description' => 'Guardar Asignaturas',
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
            'name' => 'admin.asignaturas.update',
            'description' => 'Actualizar Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.asignaturas.show',
            'description' => 'Ver Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.asignaturas.destroy',
            'description' => 'Eliminar Asignaturas',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        ///////////////////////////////////////////////

        // PERMISO DE DASHBOARD
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

        ////////////////////////////////////////////////////

        // PERMISO DE PROFESORES

        // NOTAS
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

        //////////////////////////////////////

        // CITAS
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

        //////////////////////////////////////////////

        // ASISTENCIAS
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

        //////////////////////////////////////

        //PERMISO DE CALIFICACIONES
        Permission::create([
            'name' => 'admin.calificaciones.index',
            'description' => 'Ver Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.calificaciones.create',
            'description' => 'Crear Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.calificaciones.store',
            'description' => 'Guardar Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.calificaciones.edit',
            'description' => 'Editar Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.calificaciones.update',
            'description' => 'Actualizar Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
        Permission::create([
            'name' => 'admin.calificaciones.show',
            'description' => 'Ver Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Permission::create([
            'name' => 'admin.calificaciones.destroy',
            'description' => 'Eliminar Calificaciones',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
    }
}
