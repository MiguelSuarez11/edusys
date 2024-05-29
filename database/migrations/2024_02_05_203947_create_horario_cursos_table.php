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
        Schema::create('horario_cursos', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->unsignedSmallInteger('horarios_id');
            $table->unsignedSmallInteger('curso_id');
            $table->foreign('horarios_id')->references('id')->on('horarios');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->boolean('estado')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_cursos');
    }
};
