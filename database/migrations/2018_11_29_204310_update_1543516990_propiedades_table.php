<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1543516990PropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('propiedades', function (Blueprint $table) {
            if(Schema::hasColumn('propiedades', 'imgagenes_id')) {
                $table->dropForeign('21142_5c0032d11d6b0');
                $table->dropIndex('21142_5c0032d11d6b0');
                $table->dropColumn('imgagenes_id');
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
        Schema::table('propiedades', function (Blueprint $table) {
                        
        });

    }
}
