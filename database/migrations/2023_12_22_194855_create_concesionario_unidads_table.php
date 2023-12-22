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
        Schema::create('concesionario_unidad', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_Usuario')->unsigned();
            $table->integer('id_Unidad')->unsigned();
            $table->timestamps();

            $table->foreign('id_Usuario')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('id_Unidad')->references('id_Unidad')->on('unidad')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concesionario_unidads');
    }
};
