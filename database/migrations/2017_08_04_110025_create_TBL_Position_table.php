<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Positions',function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();

            $table->timestamps();
        });

        // Create table for associating players to positions (Many-to-Many)
        Schema::create('TBL_Position_Player', function (Blueprint $table) {
            $table->integer('player_id')->unsigned();
            $table->integer('position_id')->unsigned();

            $table->foreign('player_id')->references('id')->on('TBL_Players')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('TBL_Positions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['player_id', 'position_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TBL_Players');
        Schema::dropIfExists('TBL_Position_Player');
    }
}
