<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documents', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->string('type');
            $table->string('route');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
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
		Schema::drop('documents', function(Blueprint $table)
		{
			//
		});
	}

}
