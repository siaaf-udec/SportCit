<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nit');
            $table->string('address');
            $table->string('phone');
            $table->string('fundation');
            $table->string('club_colors');
            $table->string('link');
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
        Schema::dropIfExists('TBL_Organizations');
    }
}
