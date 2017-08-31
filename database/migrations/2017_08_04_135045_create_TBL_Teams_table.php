<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')
                ->nullable()
                ->comment('Nombre');
            $table->date('season')
                ->nullable()
                ->comment('Temporada');
            $table->string('city')
                ->nullable()
                ->comment('Ciudad');
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
        Schema::dropIfExists('TBL_Teams');
    }
}
