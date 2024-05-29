<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EncabezadoTableSeeder::class);
        $this->call(Encabezado_detTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(PersonalTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
