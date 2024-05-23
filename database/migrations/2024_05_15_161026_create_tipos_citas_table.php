<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_citas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        // Insertar los tipos de citas
        DB::table('tipos_citas')->insert([
            ['nombre' => 'Consulta médica'],
            ['nombre' => 'Prueba de laboratorio'],
            ['nombre' => 'Consulta especializada'],
            ['nombre' => 'Examen físico'],
            ['nombre' => 'Consulta virtual'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_citas');
    }
}
