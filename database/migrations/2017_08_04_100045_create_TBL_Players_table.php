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
        Schema::create('TBL_Players', function (Blueprint $table) {
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
            $table->enum('foot', ['Zurdo', 'Diestro', 'Ambos'])
                ->nullable()
                ->comment('Pie');
            $table->string('motto')
                ->nullable()
                ->comment('Lema');
            $table->enum('state', ['Activo', 'Inactivo'])
                ->default('Inactivo');
            $table->string('current_club')
                ->nullable()
                ->comment('Club actual');
            $table->string('favorite_player')
                ->nullable()
                ->comment('Jugador favorito');
            $table->text('strengths')
                ->nullable()
                ->comment('Fortalezas');
            $table->text('weakness')
                ->nullable()
                ->comment('Debilidades');
            $table->text('training_target')
                ->nullable()
                ->comment('Objetivos de entrenamiento');
            $table->text('other')
                ->nullable()
                ->comment('Otros');

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
