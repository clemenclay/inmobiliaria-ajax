<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1543517425PropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('propiedades')) {
            Schema::create('propiedades', function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('publicado')->nullable()->default('0');
                $table->string('titulo');
                $table->string('descripcion');
                $table->decimal('precio', 15, 2)->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades');
    }
}
