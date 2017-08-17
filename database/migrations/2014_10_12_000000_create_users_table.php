<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type_document', ['C.C', 'T.I'])->nullable();
            $table->string('number_document')->nullable();
            $table->string('name_user');
            $table->string('lastname_user');
            $table->date('birthday')->nullable();
            $table->string('phone_user')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('state_user', ['Activo', 'Inactivo'])->default('Inactivo');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
