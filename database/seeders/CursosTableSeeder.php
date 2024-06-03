<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::create([
            'nombre' => 'Primero A',
            'nomenclatura' => '1º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Primero B',
            'nomenclatura' => '1º B',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Segundo A',
            'nomenclatura' => '2º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Segundo B',
            'nomenclatura' => '2º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Tercero A',
            'nomenclatura' => '3º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Tercero B',
            'nomenclatura' => '3º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Cuarto A',
            'nomenclatura' => '4º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Cuarto B',
            'nomenclatura' => '4º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Quinto A',
            'nomenclatura' => '5º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Quinto B',
            'nomenclatura' => '5º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Sexto A',
            'nomenclatura' => '6º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Sexto B',
            'nomenclatura' => '6º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Septimo A',
            'nomenclatura' => '7º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Septimo B',
            'nomenclatura' => '7º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Octavo A',
            'nomenclatura' => '8º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Octavo B',
            'nomenclatura' => '8º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Noveno A',
            'nomenclatura' => '9º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Noveno B',
            'nomenclatura' => '9º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Decimo A',
            'nomenclatura' => '10º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Decimo B',
            'nomenclatura' => '10º B',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Undecimo A',
            'nomenclatura' => '11º A',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Undecimo B',
            'nomenclatura' => '11º B',
            'estado' => 1,
        ]);
    }
}
