<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('description');
            $table->string('category');
            $table->string('unit_of_measurement' , 5);
            $table->decimal('unit_price' ,8 , 2);
            $table->decimal('quantity_on_hand' ,8 , 2);
            $table->integer('last_ci_no');
            $table->integer('last_ch_no');
            $table->boolean('record_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('product');
    }
}
