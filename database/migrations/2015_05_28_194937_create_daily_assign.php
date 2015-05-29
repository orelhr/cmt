<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyAssign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_schedule', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_week_schedule_perfil')->unsigned();
            $table->integer('id_location')->unsigned();
            $table->integer('id_guest')->unsigned();
            $table->time('travel_time');
            $table->string('event_name');
            $table->time('initial_time');
            $table->time('end_time');
            $table->string('character');
            $table->string('comment');
            $table->string('completed');
            $table->string('active');
            $table->string('created_by');
            $table->string('modified_by');
            $table->string('file');
            $table->string('odometro');
            $table->string('km');
            $table->string('coordinates');
            $table->string('longitud');
            $table->string('latitud');
            $table->timestamp('photo_date');
            $table->string('location');

            $table->timestamps();

            // FOREIGN KEYS
            $table->foreign('id_week_schedule_perfil')->references('id')->on('week_schedule_perfil');
            $table->foreign('id_location')->references('id')->on('location');
            $table->foreign('id_guest')->references('id')->on('guest');






		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('daily_schedule', function(Blueprint $table)
		{
			//
		});
	}

}
