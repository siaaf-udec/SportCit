<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBLFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TBL_Files',function (Blueprint $table){
            $table->increments('id');
            $table->string('name_file');
            $table->string('url_file');
            $table->enum('type_file', ['Legalidad', 'Perfil']);
            $table->integer('fileable_id');
            $table->string('fileable_type');
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
        Schema::dropIfExists('TBL_Files');
    }
}
