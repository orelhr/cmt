<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policies', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('number');
            $table->timestamp('initial_date');
            $table->timestamp('final_date');
            $table->string('last_policy');
            $table->string('endorsement');
            $table->string('agreement');
            $table->string('url');
            $table->string('active');
            $table->timestamp('active_date');
            $table->integer('id_policy_detail');
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
		Schema::drop('policies');
	}

}
