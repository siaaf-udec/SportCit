<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLCategoryPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Category_Player',function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('gender', ['Masculino', 'Femenino']);
            $table->date('starting_year');
            $table->date('final_year');
            $table->enum('state_category', ['Activo', 'Inactivo'])->default('Activo');
            $table->integer('space');
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
        Schema::dropIfExists('TBL_Category_Player');
    }
}
