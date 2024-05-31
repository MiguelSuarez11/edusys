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
            'nombre' => 'Primero a',
            'nomenclatura' => '1º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Primero b',
            'nomenclatura' => '1º b',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Segundo a',
            'nomenclatura' => '2º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Segundo b',
            'nomenclatura' => '2º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Tercero a',
            'nomenclatura' => '3º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Tercero b',
            'nomenclatura' => '3º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Cuarto a',
            'nomenclatura' => '4º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Cuarto b',
            'nomenclatura' => '4º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Quinto a',
            'nomenclatura' => '5º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Quinto b',
            'nomenclatura' => '5º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Sexto a',
            'nomenclatura' => '6º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Sexto b',
            'nomenclatura' => '6º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Septimo a',
            'nomenclatura' => '7º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Septimo b',
            'nomenclatura' => '7º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Octavo a',
            'nomenclatura' => '8º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Octavo b',
            'nomenclatura' => '8º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Noveno a',
            'nomenclatura' => '9º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Noveno b',
            'nomenclatura' => '9º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Decimo a',
            'nomenclatura' => '10º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Decimo b',
            'nomenclatura' => '10º b',
            'estado' => 1,
        ]);

        Curso::create([
            'nombre' => 'Undecimo a',
            'nomenclatura' => '11º a',
            'estado' => 1,
        ]);
        Curso::create([
            'nombre' => 'Undecimo b',
            'nomenclatura' => '11º b',
            'estado' => 1,
        ]);
    }
}
