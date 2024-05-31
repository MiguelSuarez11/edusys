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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->unsignedSmallInteger('personal_id');
            $table->unsignedSmallInteger('asignatura_id');
            $table->float('nota_1')->default(0);
            $table->float('nota_2')->default(0);
            $table->float('nota_3')->default(0);
            $table->float('nota_4')->default(0);
            $table->float('nota_definitiva')->default(0);
            $table->text('observaciones')->nullable();
            $table->boolean('estado')->default(1);
            $table->unsignedSmallInteger('curso_id');
            $table->unsignedBigInteger('periodo_id');
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
