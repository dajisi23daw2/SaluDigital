<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacunas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('motivo');
            $table->string('nombre_comercial');
            $table->string('lote');
            $table->string('centro_administracion');
            $table->string('via_administracion');
            $table->string('localizacion_anatomica');
            $table->string('origen_informacion');
            // Puedes agregar más columnas si lo necesitas
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
        Schema::dropIfExists('vacunas');
    }
}
