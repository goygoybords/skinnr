<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChargeInvoiceDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('charge_invoice_detail', function (Blueprint $table) {
            $table->increments('chd_no');
            $table->integer('product_id');
            $table->decimal('quantity' ,8 , 2);
            $table->decimal('unit_price' ,8 , 2);
            $table->decimal('amount' ,8 , 2);
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
        Schema::drop('charge_invoice_detail');
    }
}
