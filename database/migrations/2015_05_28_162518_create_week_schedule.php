<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekSchedule extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('week_schedule', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->date('initial_date');
            $table->date('end_date');
		});

        Schema::create('week_schedule_perfil', function (Blueprint $table){

            $table->increments('id');
            $table->integer('id_week_schedule')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->string('active');
            $table->foreign('id_week_schedule')->references('id')->on('week_schedule');
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
		Schema::drop('week_schedule', function(Blueprint $table)
		{
			//
		});
	}

}
