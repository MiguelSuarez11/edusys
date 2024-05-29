<?php

namespace Database\Seeders;

use App\Models\encabezados;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncabezadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        encabezados::create([
            'nombre'=>'Tipo de Documento',  
        ]);
        
        encabezados::create([
            'nombre'=>'Genero',  
        ]);
        encabezados::create([
            'nombre'=>'trimestre',  
        ]);
    }
}
