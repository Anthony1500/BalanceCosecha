<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasFrutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_frutas', function (Blueprint $table) {
            $table->id('cod_factura'); // Clave primaria
            $table->string('productor', 100)->nullable(); // Nulo
            $table->string('identificacion', 20)->unique(); // Único
            $table->string('direccion', 100)->nullable(); // Nulo
            $table->string('producto', 50)->nullable(); // Nulo
            $table->string('responsable_cosecha', 100)->nullable(); // Nulo
            $table->string('transportista_responsable', 100)->nullable(); // Nulo
            $table->integer('numero_de_gavetas')->nullable(); // Nulo
            $table->integer('numero_de_tarrinas')->nullable(); // Nulo
            $table->date('fecha_cosecha')->nullable(); // Nulo
            $table->date('fecha_entrega')->nullable(); // Nulo
            $table->integer('cantidad_total')->nullable(); // Nulo
            $table->string('calidad', 50)->nullable(); // Nulo
            $table->integer('cantidad_de_calidad')->nullable(); // Nulo
            $table->string('numero_de_lote_finca_kilos', 50)->nullable(); // Nulo
            $table->decimal('precio_por_kilo', 8, 2)->nullable(); // Nulo
            $table->decimal('total', 8, 2)->nullable(); // Nulo
            $table->decimal('total_a_pagar', 8, 2)->nullable(); // Nulo
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
        Schema::dropIfExists('facturas_frutas');
    }
}
