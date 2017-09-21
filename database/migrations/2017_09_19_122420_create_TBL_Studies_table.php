<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('institution')->comment('Institución de estudio');
            $table->string('title')->comment('Titulo obtenido');
            $table->string('year')->comment('Año de obtención');
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
        Schema::dropIfExists('TBL_Studies');
    }
}
