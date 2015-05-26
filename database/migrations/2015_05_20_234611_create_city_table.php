<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('name');
            $table->integer('id_state')->unsigned();
            $table->string('description');
            $table->string('active');

            $table->foreign('id_state')->references('id')->on('state');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('city', function(Blueprint $table)
		{
			//
		});
	}

}
