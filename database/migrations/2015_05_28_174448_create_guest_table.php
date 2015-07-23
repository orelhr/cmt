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

        Schema::create('guest_type', function (Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('active');


        });
		Schema::create('guest', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('second_lastname');
            $table->string('charge');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('active');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('number');
            $table->string('zipcode');
            $table->string('street');
            $table->string('location');
            $table->integer('id_guest_type')->unsigned();
            $table->string('success_case');
            $table->timestamps();


            $table->foreign('id_guest_type')->references('id')->on('guest_type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('guest_type', function(Blueprint $table){


        });
		Schema::drop('guest', function(Blueprint $table)
		{
			//
		});
	}

}
