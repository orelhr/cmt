<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guest', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('second_lastname');
            $table->string('charge');
            $table->string('phone');
            $table->string('email');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->string('active');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('number');
            $table->string('zipcode');
            $table->string('street');
            $table->string('location');
            $table->string('success_case');
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('guest', function(Blueprint $table)
		{
			//
		});
	}

}
