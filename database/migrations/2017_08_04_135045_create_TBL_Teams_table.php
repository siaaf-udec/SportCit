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
        Schema::create('TBL_Teams',function (Blueprint $table){
            $table->increments('id');
            $table->string('club');
            $table->date('season');
            $table->string('street');
            $table->string('zip_code');
            $table->string('city');
            $table->string('phone');
            $table->string('home_field');
            $table->integer('fk_org_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fk_org_id')
                ->references('id')->on('TBL_Organizations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
