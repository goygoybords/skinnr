<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('name');
            $table->string('address');
            $table->string('contact_person');
            $table->decimal('credit_limit' ,8 , 2);
            $table->decimal('credit_balance' ,8 , 2);
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
        Schema::drop('customer');
    }
}
