<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicle', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_policy')->unsigned();
            $table->string('name');
            $table->string('motor');
            $table->string('serie');
            $table->string('plates');
            $table->string('use');
            $table->string('service');
            $table->string('model');
            $table->string('capacity');
            $table->string('charge');
            $table->string('trailer');
            $table->string('rate');
            $table->string('clause');
            $table->string('observations');
            $table->string('accesories');
            $table->string('color');
            $table->string('type');
            $table->timestamp('inital_date');
            $table->timestamp('end_date');
            $table->string('active');

            $table->foreign('id_policy')->references('id')->on('policy');



		});

        Schema::create('vehicle_perfil', function (Blueprint $table){

            $table->increments('id');
            $table->integer('id_perfil')->unsigned('id');
            $table->integer('id_vehicle')->unsigned('id');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->string('active');

            $table->foreign('id_perfil')->references('id')->on('perfil');
            $table->foreign('id_vehicle')->references('id')->on('perfil');


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('vehicle_perfil', function (Blueprint $table){});
		Schema::drop('vehicle', function(Blueprint $table)
		{
			//
		});
	}

}
