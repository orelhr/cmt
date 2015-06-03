<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoDoctos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('auto_documents', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('documentation');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->string('active');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('auto_documents', function(Blueprint $table)
		{
			//
		});
	}

}
