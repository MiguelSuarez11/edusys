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
        Schema::create('_asistencia_estudiante', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->string('event');
            $table->dateTime('Start_date');
            $table->datetime('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_asistencia_estudiante');
    }
};
