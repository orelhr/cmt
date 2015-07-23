<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->integer('id_location')->unsigned();
			$table->integer('id_guest')->unsigned();
			$table->string('name');
			$table->string('phone');
			$table->string('ext');
			$table->string('phone2');
			$table->string('ext2');
			$table->string('address');
			$table->string('email');
			$table->string('fax');
			$table->string('active');
			$table->string('generated_accion');
			$table->string('comments');
			$table->timestamps();

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
		Schema::drop('group', function(Blueprint $table)
		{
			//
		});
	}

}
