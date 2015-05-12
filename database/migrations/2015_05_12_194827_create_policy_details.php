<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyDetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy_details', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('rfc');
            $table->string('phone');
            $table->string('agent');
            $table->string('active');
            $table->timestamp('active_date');
            $table->timestamp('inactive_date');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('policy_details', function(Blueprint $table)
		{
			//
		});
	}

}
