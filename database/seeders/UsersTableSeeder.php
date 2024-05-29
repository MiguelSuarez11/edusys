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
            'admin.usuarios.index',
            'admin.usuarios.edit',
            'admin.usuarios.destroy',
            'admin.personal.index',
            'admin.personal.create',
            'admin.personal.edit',
            'admin.personal.store',
            'admin.personal.update',
            'admin.personal.show',
            'admin.personal.destroy',
            'admin.cursos.index',
            'admin.cursos.create',
            'admin.cursos.edit',
            'admin.cursos.destroy',
            'admin.rol.index',
            'admin.rol.create',
            'admin.rol.edit',
            'admin.rol.destroy',
            'admin.asignaturas.index',
            'admin.asignaturas.create',
            'admin.asignaturas.edit',
            'admin.asignaturas.destroy',
            'admin.dashboard',
        ];

        $adminRole->givePermissionTo($permissions);
    }
}
