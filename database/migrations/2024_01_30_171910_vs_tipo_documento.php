<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
             DB::statement('DROP VIEW IF EXISTS vs_tipo_documento');
            // Crear una vista SQL
            DB::statement('CREATE VIEW vs_tipo_documento AS SELECT id, nombre,nomenclatura FROM encabezados_dets WHERE encabezados_id = 1');
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
           // Eliminar la vista si es necesario
           DB::statement('DROP VIEW IF EXISTS vs_tipo_documento');
        }
};
