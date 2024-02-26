<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id('id_proyecto'); // Clave primaria
            $table->string('nombre_proyecto', 100)->unique(); // Único
            $table->string('ruc', 20)->unique(); // Único
            $table->string('socios', 100)->nullable(); // Nulo
            $table->string('pais', 50)->nullable(); // Nulo
            $table->string('provincia', 50)->nullable(); // Nulo
            $table->string('ciudad', 50)->nullable(); // Nulo
            $table->string('direccion_proyecto', 100)->nullable(); // Nulo
            $table->string('area_terreno', 100)->nullable(); // Nulo
            $table->integer('numero_plantas_arandanos')->nullable(); // Nulo
            $table->integer('numero_plantas_fresas')->nullable(); // Nulo
            $table->string('coordenadas', 100)->nullable(); // Nulo
            $table->unsignedBigInteger('id_registro');
            $table->timestamps();

            // Definición de la clave foránea
            $table->foreign('id_registro')->references('id_registro')->on('registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}
