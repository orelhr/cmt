<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('name');
            $table->integer('id_city')->unsigned();
            $table->string('description');
            $table->string('active');

            $table->foreign('id_city')->references('id')->on('city');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location', function(Blueprint $table)
		{
			//
		});
	}

}
