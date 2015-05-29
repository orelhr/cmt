<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('active');
            $table->integer('id_country')->unsigned();
            $table->timestamps();
            $table->foreign('id_country')->references('id')->on('country');

		});

        Schema::create('state_perfil', function(Blueprint $table){

            $table->increments('id');
            $table->integer('id_state')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->string('active');

            $table->foreign('id_state')->references('id')->on('state');
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
        Schema::drop('state_perfil', function(Blueprint $table){

        });
		Schema::drop('state', function(Blueprint $table)
		{
			//
		});

	}

}
