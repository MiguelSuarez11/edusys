<?php

namespace Database\Seeders;

use App\Models\Personal;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $thirddata = Personal::create([
                'tipo_documento' => $faker->numberBetween(1, 3),
                'numero_documento' => $faker->unique()->numerify('########'),
                'nombres' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'direccion' => $faker->address,
                'telefono' => $faker->phoneNumber,
                'correo' => $faker->unique()->safeEmail,
                'fech_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'genero' => $faker->numberBetween(4, 5),
                'cursos' => $faker->numberBetween(1, 10), // Asegúrate de que estos IDs de curso existan en la tabla 'cursos'
                'estado' => $faker->boolean,
                'created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'updated_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ]);
            User::create([
                'personal_id' => $thirddata['id'],
                'email' => $faker->unique()->safeEmail,
                'password' => '1234',
            ])->assignRole('Profesor');
        }
    }
}
