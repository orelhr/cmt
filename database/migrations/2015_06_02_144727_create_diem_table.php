<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diem', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->string('authorize_number');
            $table->string('assigned_amount');
            $table->float('dime');
            $table->float('balance');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->string('active');
            $table->string('modified_user');
            $table->timestamp('modified_time');

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
		Schema::drop('diem', function(Blueprint $table)
		{
			//
		});
	}

}
