<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periodo::create(['nombre' => '1' , 'nomenclatura' => 'P1']);
        Periodo::create(['nombre' => '2' , 'nomenclatura' => 'P2']);
        Periodo::create(['nombre' => '3' , 'nomenclatura' => 'P3']);
        Periodo::create(['nombre' => '4' , 'nomenclatura' => 'P4']);
    }
}
