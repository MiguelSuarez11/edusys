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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->unsignedSmallInteger('personal_id');
            $table->unsignedSmallInteger('curso_id');
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->boolean('estado')->default(1)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::table('asistencias', function (Blueprint $table) {
            $table->dropForeign(['personal_id']);
            $table->dropForeign(['curso_id']);
        });

          // Then, drop the table
          Schema::dropIfExists('asistencias');


    }
};
