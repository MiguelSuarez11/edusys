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
        Schema::create('personals', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->string('tipo_documento');
            $table->string('numero_documento')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo');
            $table->string('fech_nacimiento')->nullable();
            $table->string('genero')->nullable();
            $table->unsignedSmallInteger('cursos');
            $table->foreign('cursos')->references('id')->on('cursos');
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
