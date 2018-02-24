<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informaciones', function (Blueprint $table) {
			$table->increments('idInfo');
				
			$table->string('titulo');
			$table->string('texto');
			$table->string('urlArchivo');
			$table->integer('idUsuarioCreacion');			
			$table->date('fechaAlta');
			$table->date('fechaBaja');
				
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
		Schema::dropIfExists('informaciones');
	}
}
