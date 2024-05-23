<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToMedicacionesTable extends Migration
{
    
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('medicaciones', function (Blueprint $table) {
                $table->unsignedBigInteger('usuario_id')->nullable();
                $table->foreign('usuario_id')->references('id')->on('users');
            });
        }
    
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('medicaciones', function (Blueprint $table) {
                $table->dropForeign(['usuario_id']);
                $table->dropColumn('usuario_id');
            });
        }
    }
    
