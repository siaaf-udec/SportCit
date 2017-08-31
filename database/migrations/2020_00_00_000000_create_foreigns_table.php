<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsTable extends Migration
{
    /**
     * Run the migrations to create foreign keys.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('TBL_Category_Player', function (Blueprint $table) {
            $table->integer('fk_organization_id')->unsigned();
            $table->foreign('fk_organization_id')
                ->references('id')->on('TBL_Organizations')
                ->onUpdate('cascade')//Actualización en casacada
                ->onDelete('cascade');//Eliminacion en casacada

        });
        Schema::table('TBL_Players', function (Blueprint $table) {
            $table->integer('fk_cate_player_id')->unsigned();
            $table->foreign('fk_cate_player_id')
                ->references('id')->on('TBL_Category_Player')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('fk_user_id')->unsigned();
            $table->foreign('fk_user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('fk_organization_id')->unsigned();
            $table->foreign('fk_organization_id')
                ->references('id')->on('TBL_Organizations')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('fk_team_id')->nullable()->unsigned();
            $table->foreign('fk_team_id')
                ->references('id')->on('TBL_Teams')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('TBL_Organizations', function (Blueprint $table) {
            $table->integer('fk_user_id')->unsigned();
            $table->foreign('fk_user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
        Schema::table('TBL_Teams', function (Blueprint $table) {
            $table->integer('fk_org_id')->unsigned();
            $table->foreign('fk_org_id')
                ->references('id')->on('TBL_Organizations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}