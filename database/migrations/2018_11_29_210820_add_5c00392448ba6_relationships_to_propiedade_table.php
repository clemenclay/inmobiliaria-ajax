<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c00392448ba6RelationshipsToPropiedadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propiedades', function(Blueprint $table) {
            if (!Schema::hasColumn('propiedades', 'moneda_id')) {
                $table->integer('moneda_id')->unsigned()->nullable();
                $table->foreign('moneda_id', '21310_5c003923eccff')->references('id')->on('monedas')->onDelete('cascade');
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
