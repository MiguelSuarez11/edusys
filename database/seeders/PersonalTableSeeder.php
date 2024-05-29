<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personal;

class PersonalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
     personal::create([
        'id'=>'1',
        'tipo_documento'=>'1',
        'numero_documento'=>'0000',
        'nombres'=>'Administrador',
        'apellidos'=>'sistema',
        'direccion'=>'atlantico',
        'telefono'=>'0000',
        'correo'=>'admin@edusys.com',
        'genero'=>'4',
        'cursos'=>'1',
        'estado'=>'1',
     ]);
    }
}
