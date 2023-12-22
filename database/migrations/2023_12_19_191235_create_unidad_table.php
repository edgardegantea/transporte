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
        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id_Unidad');
            $table->string('numeroUnidad', 15);
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->string('placa', 8);
            $table->integer('capacidadPasajero');
            $table->date('fechaFabricacion');
            $table->date('fechaAdquisicion');
            $table->enum('tipoCombustible', ['Diesel', 'Gasolina', 'Gas']);
            $table->integer('kilometrajeActual');
            $table->string('descripcion', 100);
            $table->string('estatus', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
