<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Noticia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Noticias', function(Blueprint $table){
        	$table->increments('idNoticia');
        	
        	$table->string('titulo');
        	$table->string('intro');
        	$table->text('texto');
        	$table->date('fechaAlta');
        	$table->date('fechaBaja');
        	$table->integer('idUsuarioCreacion');
        	$table->string('urlImagenIntro');
        	$table->string('urlCarpetaImagenes');
        	
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
        Schema::dropIfExists('Noticias');
    }
}
