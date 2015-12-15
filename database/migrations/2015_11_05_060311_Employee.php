<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('employee', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('username' , 60)->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->string('position');
            $table->rememberToken();
            $table->boolean('status');
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
        Schema::drop('employee');
    }
}
