<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country', function(Blueprint $table)
		{
			//

            $table->increments('id');
            $table->string('name');
            $table->string('active');
            $table->timestamps();


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('country', function(Blueprint $table)
		{
			//


		});
	}

}
