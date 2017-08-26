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
            $table->date('birthday');
            $table->string('place_birth');
            $table->integer('edad');
            $table->string('eps');
            $table->string('occupation');
            $table->string('school');
            $table->string('direccion');
            $table->string('name_father');
            $table->string('lastname_father');
            $table->string('occupation_father');
            $table->string('phone_father');
            $table->string('name_mother');
            $table->string('lastname_mother');
            $table->string('occupation_mother');
            $table->string('phone_mother');
            $table->string('weight');
            $table->string('height');
            $table->string('position');
            $table->string('current_position');
            $table->string('diseases');
            $table->string('favorite_club');
            $table->string('favorite_player');
            $table->string('motto');
            $table->string('present_club');
            $table->timestamps();
            $table->softDeletes();
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
