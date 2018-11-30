<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c0032d170a90RelationshipsToPropiedadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propiedades', function(Blueprint $table) {
            if (!Schema::hasColumn('propiedades', 'imgagenes_id')) {
                $table->integer('imgagenes_id')->unsigned()->nullable();
                $table->foreign('imgagenes_id', '21142_5c0032d11d6b0')->references('id')->on('galerias')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('propiedades', function(Blueprint $table) {
            
        });
    }
}
