<?php

namespace Database\Seeders;

use App\Models\encabezados_det;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Encabezado_detTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        encabezados_det::create([
            'encabezados_id' => '1',
            'nombre' => 'Cedula de Ciudadania',
            'nomenclatura'=>'CC'
        ]);
        encabezados_det::create([
            'encabezados_id' => '1',
            'nombre' => 'Tarjeta de Identidad',
            'nomenclatura'=>'TI'
        ]);
        encabezados_det::create([
            'encabezados_id' => '1',
            'nombre' => 'Permiso de Permanencia',
            'nomenclatura'=>'PPT'
        ]);
        encabezados_det::create([
            'encabezados_id' => '2',
            'nombre' => 'Masculino',
            'nomenclatura'=>'MAS'
        ]);
        encabezados_det::create([
            'encabezados_id' => '2',
            'nombre' => 'Femenino',
            'nomenclatura'=>'FEM'
        ]);
        encabezados_det::create([
            'encabezados_id' => '3',
            'nombre' => 'Primer',
            'nomenclatura'=>'1º'
        ]);
        encabezados_det::create([
            'encabezados_id' => '3',
            'nombre' => 'Segundo',
            'nomenclatura'=>'1º'
        ]);
        encabezados_det::create([
            'encabezados_id' => '3',
            'nombre' => 'Tercero',
            'nomenclatura'=>'3º'
        ]);
        encabezados_det::create([
            'encabezados_id' => '3',
            'nombre' => 'Cuarto',
            'nomenclatura'=>'4º'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'lunes',
            'nomenclatura'=>'lun'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'martes',
            'nomenclatura'=>'mart'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'miercoles',
            'nomenclatura'=>'mier'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'jueves',
            'nomenclatura'=>'juev'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'viernes',
            'nomenclatura'=>'vier'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'sabado',
            'nomenclatura'=>'sab'
        ]);

        encabezados_det::create([
            'encabezados_id' => '4',
            'nombre' => 'domingos',
            'nomenclatura'=>'dom'
        ]);
    }
}
