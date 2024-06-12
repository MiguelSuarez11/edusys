<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un usuario de ejemplo
        $user = User::create([
            'personal_id' => '1',
            'email' => 'admin@edusys.com',
            'password' => bcrypt('admin2024'), // Cambia esto por la contraseña que desees

        ]);
        $user2 = User::create([
            'personal_id' => '1',
            'email' => 'estudiante@edusys.com',
            'password' => bcrypt('estudiante2024'), // Cambia esto por la contraseña que desees

        ]);
        $user3 = User::create([
            'personal_id' => '1',
            'email' => 'profesor@edusys.com',
            'password' => bcrypt('profesor'), // Cambia esto por la contraseña que desees

        ]);

        $prueba = Role::where('name', 'Estudiante')->first();
        $user2->assignRole($prueba);
        // Asigna el rol de administrador al usuario
        $adminRole = Role::where('name', 'Administrador')->first();
        $user->assignRole($adminRole);

        $Profesor = Role::where('name', 'Profesor')->first();
        $user3->assignRole($Profesor);

        $permissions = [

            // PERMISOS DE USUARIOS
            'admin.usuarios.index',
            'admin.usuarios.create',
            'admin.usuarios.store',
            'admin.usuarios.edit',
            'admin.usuarios.update',
            'admin.usuarios.show',
            'admin.usuarios.destroy',

            //PERMISOS DE PERSONAL
            'admin.personal.index',
            'admin.personal.create',
            'admin.personal.edit',
            'admin.personal.store',
            'admin.personal.update',
            'admin.personal.show',
            'admin.personal.destroy',

            //PERMISOS DE CURSOS
            'admin.cursos.index',
            'admin.cursos.create',
            'admin.cursos.store',
            'admin.cursos.show',
            'admin.cursos.edit',
            'admin.cursos.update',
            'admin.cursos.destroy',



            //PERMISOS DE ROLES
            'admin.rol.index',
            'admin.rol.create',
            'admin.rol.edit',
            'admin.rol.store',
            'admin.rol.show',
            'admin.rol.update',
            'admin.rol.destroy',

            //PERMISOS DE ASIGNATURAS
            'admin.asignaturas.index',
            'admin.asignaturas.create',
            'admin.asignaturas.store',
            'admin.asignaturas.show',
            'admin.asignaturas.edit',
            'admin.asignaturas.update',
            'admin.asignaturas.destroy',

            //PERMISOS DE CALIFICACIONES
            'admin.calificaciones.index',
            'admin.calificaciones.create',
            'admin.calificaciones.store',
            'admin.calificaciones.show',
            'admin.calificaciones.edit',
            'admin.calificaciones.update',
            'admin.calificaciones.destroy',

            //PERMISOS DE EVENTOS
            'admin.eventos.index',
            'admin.eventos.create',
            'admin.eventos.store',
            'admin.eventos.show',
            'admin.eventos.edit',
            'admin.eventos.update',
            'admin.eventos.destroy',





            'admin.dashboard',
        ];

        ////////////////////////////////////////////////////////////////

        $permissions_profesor = [

            //PERMISOS DE CALIFICACIONES
            'admin.calificaciones.index',
            'admin.calificaciones.create',
            'admin.calificaciones.store',
            'admin.calificaciones.show',
            'admin.calificaciones.edit',
            'admin.calificaciones.update',
            'admin.calificaciones.destroy',




            'teacher.dashboard',

        ];

        $permissions_estudiantes = [

            //PERMISOS DE CALIFICACIONES
            'admin.eventos.index',
            'admin.eventos.create',
            'admin.eventos.store',
            'admin.eventos.show',
            'admin.eventos.edit',
            'admin.eventos.update',
            'admin.eventos.destroy',




            'estudent.dashboard',

        ];

        $prueba->givePermissionTo($permissions_estudiantes);
        $Profesor->givePermissionTo($permissions_profesor);
        $adminRole->givePermissionTo($permissions);
    }
}
