<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifiesAccident extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifies_accident', function(Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('id_location')->unsigned();
            $table->integer('id_perfil')->unsigned();
            $table->string('agency_name');
            $table->string('adjust_name');
            $table->text('description');
            $table->string('sinister_number');
            $table->timestamp('initial_date');
            $table->string('cost');
            $table->string('active');

            $table->foreign('id_location')->references('id')->on('location');
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
		Schema::drop('notifies_accident', function(Blueprint $table)
		{
			//
		});
	}

}
