<?php

namespace Database\Seeders;

use App\Models\Asignatura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asignatura::create(['nombre' => 'Matematicas', 'nomenclatura' => 'MT']);
        Asignatura::create(['nombre' => 'Sociales', 'nomenclatura' => 'SC']);
        Asignatura::create(['nombre' => 'Ingles', 'nomenclatura' => 'IN']);
        Asignatura::create(['nombre' => 'Español', 'nomenclatura' => 'ES']);
    }
}
