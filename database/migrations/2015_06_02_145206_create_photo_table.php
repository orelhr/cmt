<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo', function(Blueprint $table)
		{
			//


            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->timestamp('send_date');
            $table->string('active');

            $table->foreign('id_perfil')->references('id')->on('perfil');



		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photo', function(Blueprint $table)
		{
			//
		});
	}

}
