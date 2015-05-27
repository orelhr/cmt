<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dependency', function(Blueprint $table)
		{
			//

            $table->increments('id');
            $table->integer('id_location')->unsigned();
            $table->integer('id_visit')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('phone_ext');
            $table->string('phone2');
            $table->string('phone_ext2');
            $table->string('fax');
            $table->string('address');
            $table->string('email');
            $table->string('active');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->timestamps();

            $table->foreign('id_location')->references('id')->on('location');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dependency', function(Blueprint $table)
		{
			//
		});
	}

}
