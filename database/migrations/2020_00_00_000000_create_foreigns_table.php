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
        Schema::table('TBL_Players', function (Blueprint $table) {
            $table->integer('category_user_id')->nullable()->unsigned();

            $table->foreign('category_user_id')->references('id')->on('TBL_Category_Player')
                  ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('TBL_Players', function (Blueprint $table) {
            $table->integer('user_id')->nullable()->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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