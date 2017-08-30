<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Players',function (Blueprint $table){
            $table->increments('id');

            $table->string('favorite_club')
                  ->nullable()
                  ->comment('Club favorito');
            $table->string('height')
                  ->nullable()
                  ->comment('Altura');
            $table->string('weight')
                  ->nullable()
                  ->comment('Peso');
            $table->string('position')
                  ->nullable()
                  ->comment('Posición');
            $table->string('motto')
                  ->nullable()
                  ->comment('Lema');
            $table->string('current_position')
                  ->nullable()
                  ->comment('Posición actual');
            $table->string('current_club')
                  ->nullable()
                  ->comment('Club actual');
            $table->string('favorite_player')
                  ->nullable()
                  ->comment('Jugador favorito');
            $table->string('strengths')
                  ->nullable()
                  ->comment('Fortalezas');
            $table->string('weakness')
                  ->nullable()
                  ->comment('Debilidades');
            $table->string('training_target')
                  ->nullable()
                  ->comment('Objetivo de entrenamiento');
            $table->string('other')
                  ->nullable()
                  ->comment('Otros');
            $table->string('eps')
                  ->nullable()
                  ->comment('EPS');
            $table->enum('state', ['Activo', 'Inactivo'])
                  ->default('Activo');

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
        Schema::dropIfExists('TBL_Players');
    }
}
