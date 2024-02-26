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
        Schema::create('registro', function (Blueprint $table) {
            $table->id('id_registro'); // Clave primaria
            $table->string('identificacion', 20)->unique(); // Único
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo', 100)->unique(); // Único
            $table->string('pais', 50)->nullable(); // Nulo
            $table->string('provincia', 50)->nullable(); // Nulo
            $table->string('ciudad', 50)->nullable(); // Nulo
            $table->string('direccion_domicilio', 100)->nullable(); // Nulo
            $table->string('telefono', 15)->nullable(); // Nulo
            $table->string('usuario', 50)->unique(); // Único
            $table->string('password', 100);
            $table->string('cargo', 50)->nullable(); // Nulo
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
        Schema::dropIfExists('registro');
    }
}
