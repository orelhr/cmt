<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function(Blueprint $table)
		{
			//

            $table->increments('id');
            $table->string('name');
            $table->timestamp('initial_date');
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
		Schema::drop('expenses', function(Blueprint $table)
		{
			//
		});
	}

}
