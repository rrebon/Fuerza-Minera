<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfertaLaboralMod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('OfertasLaborales', function (Blueprint $table) {
    		$table->dateTime('fechaBaja')->nullable(true)->change();
    		$table->integer('idUsuarioPublicacion')->nullable(true)->change();
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('OfertasLaborales', function (Blueprint $table) {
    		$table->dateTime('fechaBaja')->nullable(false)->change();
    		$table->integer('idUsuarioPublicacion')->nullable(false)->change();
    	});
    }
}
