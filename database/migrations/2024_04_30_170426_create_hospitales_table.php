<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Inserta algunos datos iniciales de hospitales
        DB::table('hospitales')->insert([
            ['name' => "Hospital Vall d'Hebron"],
            ['name' => "Hospital del Mar"],
            ['name' => "Hospital de Sant Pau"],
            ['name' => "Hospital Clínic de Barcelona"],
            // Agrega más hospitales según sea necesario
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitales');
    }
}

