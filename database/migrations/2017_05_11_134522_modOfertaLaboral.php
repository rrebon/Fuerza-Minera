<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModOfertaLaboral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('OfertasLaborales', function(Blueprint $table){
        	
        	$table->string('intro')->after('titulo');
        	$table->string('urlArchivo')->after('fechaBaja');
        	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('OfertasLaborales', function(){
        	$table->dropColumn('intro');
        	$table->dropColumn('urlArchivo');
        });
    }
}
