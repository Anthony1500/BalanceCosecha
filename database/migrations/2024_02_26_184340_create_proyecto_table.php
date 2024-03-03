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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id('id_proyecto'); // Clave primaria
            $table->string('nombre_proyecto', 100)->unique()->nullable(); // Único
            $table->string('ruc', 20)->unique()->nullable(); // Único
            $table->string('socios', 100)->nullable(); // Nulo
            $table->string('pais', 50)->nullable(); // Nulo
            $table->string('provincia', 50)->nullable(); // Nulo
            $table->string('ciudad', 50)->nullable(); // Nulo
            $table->string('direccion_proyecto', 100)->nullable(); // Nulo
            $table->string('area_terreno', 100)->nullable(); // Nulo
            $table->integer('numero_plantas_arandanos')->nullable(); // Nulo
            $table->integer('numero_plantas_fresas')->nullable(); // Nulo
            $table->string('coordenadas', 100)->nullable(); // Nulo
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
