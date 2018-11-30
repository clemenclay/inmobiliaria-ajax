<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c0063ceaec2bRelationshipsToPropiedadeTable extends Migration
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
                if (!Schema::hasColumn('propiedades', 'barrio_id')) {
                $table->integer('barrio_id')->unsigned()->nullable();
                $table->foreign('barrio_id', '21310_5c0062391cb9b')->references('id')->on('barrios')->onDelete('cascade');
                }
                if (!Schema::hasColumn('propiedades', 'operacion_id')) {
                $table->integer('operacion_id')->unsigned()->nullable();
                $table->foreign('operacion_id', '21310_5c0063ce5825b')->references('id')->on('tipooperacions')->onDelete('cascade');
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
