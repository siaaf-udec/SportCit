<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entity')->comment('Entidad donde laboro');
            $table->string('position')->comment('Cargo que ocupo');
            $table->string('duration')->comment('Tiempo de duración');
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
        Schema::dropIfExists('TBL_Experiences');
    }
}
