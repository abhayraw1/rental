<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('notification', function ($table) {
        $table->integer('product_id')->length(10)->unsigned();
        $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
    });   
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::table('notification', function ($table) {
            $table->dropColumn('product_id');
        });
    }
}
