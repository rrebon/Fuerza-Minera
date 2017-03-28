<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertaLaboralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OfertasLaborales', function (Blueprint $table) {
            $table->increments('idOferta');
            
            $table->string('titulo');
            $table->string('texto');
            $table->integer('idUsuarioCreacion');
            $table->integer('idUsuarioPublicacion');
            $table->dateTime('fechaAlta');
            $table->dateTime('fechaBaja');            
            
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
        Schema::dropIfExists('OfertasLaborales');
    }
}
