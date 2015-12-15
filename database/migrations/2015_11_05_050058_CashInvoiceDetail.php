<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashInvoiceDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('cash_invoice_detail', function (Blueprint $table) {
            $table->increments('cid_no');
            $table->integer('ci_no');
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
        Schema::drop('cash_invoice_detail');
    }
}
