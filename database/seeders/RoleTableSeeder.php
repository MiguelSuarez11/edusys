<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un rol 
        Role::create([
            'name' => 'Administrador',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Role::create([
            'name' => 'Estudiante',
            'guard_name' => 'web',
            'estado' => 1,
        ]);

        Role::create([
            'name' => 'Profesor',
            'guard_name' => 'web',
            'estado' => 1,
        ]);
    }
}
