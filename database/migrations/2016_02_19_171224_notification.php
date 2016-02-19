<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table){
            $table->increments('id');
            $table->integer('to')->length(10)->unsigned();
            $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
            $table->integer('from')->length(10)->unsigned();
            $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
            $table->string('added_on');
            $table->boolean('read');
            $table->smallInteger('lent_rent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notification');
    }
}
