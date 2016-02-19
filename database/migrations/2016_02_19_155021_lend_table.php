<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from')->length(10)->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->integer('to')->length(10)->unsigned();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lend_table');
    }
}
