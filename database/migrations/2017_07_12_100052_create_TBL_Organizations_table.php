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
            $table->string('name_organization');
            $table->string('nit');
            $table->string('address_organization');
            $table->string('phone_organization');
            $table->string('fundation');
            $table->string('club_colors');
            $table->string('link_organization');
            $table->enum('state_organization', ['Pendiente', 'Aprobado', 'Denegado'])->default('Pendiente');
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
        Schema::dropIfExists('TBL_Organizations');
    }
}
