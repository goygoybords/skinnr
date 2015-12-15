<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChargeInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('charge_invoice', function (Blueprint $table) {
            $table->increments('ch_no');
            $table->dateTime('ch_date');
            $table->integer('customer_id');
            $table->dateTime('ch_duedate');
            $table->decimal('total' ,8 , 2);
            $table->decimal('vat_sales' ,8 , 2);
            $table->decimal('vat' ,8 , 2);
            $table->integer('prepared_by');
            $table->string('received_by');
            $table->decimal('balance' ,8 , 2);
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
        Schema::drop('charge_invoice');
    }
}
