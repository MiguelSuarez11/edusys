<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsistenciaEstudiante extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $events=  [
             'event'=>'Lunes',
             'star_date' =>'2024-06-04 08:00',
             'end_date' =>'2024-06-04 08:00'
      ];
      $events=  [
        'event'=>'Martes',
        'star_date' =>'2024-06-04 08:00',
        'end_date' =>'2024-06-04 08:00'
 ];
      $events=  [
            'event'=>'Miercoles',
            'star_date' =>'2024-06-04 08:00',
            'end_date' =>'2024-06-04 08:00'
        ];
        $events=  [
            'event'=>'Jueves',
            'star_date' =>'2024-06-04 08:00',
            'end_date' =>'2024-06-04 08:00'
        ];
        $events=  [
            'event'=>'Viernes',
            'star_date' =>'2024-06-04 08:00',
            'end_date' =>'2024-06-04 08:00'
        ];
        foreach( $events as $event){
            Event::create($event);
        }
            }
        }
