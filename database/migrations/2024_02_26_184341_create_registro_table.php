<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id('id_registro'); // Clave primaria
            $table->string('identificacion', 20)->unique()->nullable();; // Único
            $table->string('nombre', 50)->nullable();// Nulo
            $table->string('apellido', 50)->nullable();// Nulo
            $table->string('email', 100)->unique()->nullable(); // Único
            $table->string('pais', 50)->nullable(); // Nulo
            $table->string('provincia', 50)->nullable(); // Nulo
            $table->string('ciudad', 50)->nullable(); // Nulo
            $table->string('direccion_domicilio', 100)->nullable(); // Nulo
            $table->string('telefono', 15)->nullable(); // Nulo
            $table->string('usuario', 50)->unique()->nullable(); // Único
            $table->string('password', 100)->nullable();;
            $table->string('cargo', 50)->nullable(); // Nulo
            $table->unsignedBigInteger('id_proyecto')->nullable(); // Clave foránea
            $table->timestamps();
            // Definición de la clave foránea
            $table->foreign('id_proyecto')->references('id_proyecto')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
