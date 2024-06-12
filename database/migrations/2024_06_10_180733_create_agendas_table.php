<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamp('start')->nullable(); // Columna 'start' como marca de tiempo nullable
            $table->timestamp('end')->nullable();   // Columna 'end' como marca de tiempo nullable
            $table->timestamps(); // Esto creará las columnas 'created_at' y 'updated_at' automáticamente

            $table->unsignedSmallInteger('course_id');
            // Definir las llaves foráneas
            $table->foreign('course_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
