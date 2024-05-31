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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->unsignedSmallInteger('personal_id');
            $table->float('periodo_1')->nullable();
            $table->float('periodo_2')->nullable();
            $table->float('periodo_3')->nullable();
            $table->float('periodo_4')->nullable();
            $table->float('nota_final')->nullable();
            $table->foreign('personal_id')->references('id')->on('personals');
            $table->boolean('estado')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificacions');
    }
};
