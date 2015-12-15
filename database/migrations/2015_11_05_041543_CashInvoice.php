<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CashInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           Schema::create('cash_invoice', function (Blueprint $table) {
            $table->increments('ci_no');
            $table->dateTime('ci_date');
            $table->integer('customer_id');
            $table->decimal('total' ,8 , 2);
            $table->decimal('vat_sales' ,8 , 2);
            $table->decimal('vat' ,8 , 2);
            $table->integer('prepared_by');
            $table->string('received_by');
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
        Schema::drop('cash_invoice');
    }
}
