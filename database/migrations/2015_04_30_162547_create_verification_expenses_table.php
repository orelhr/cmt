<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificationExpensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses_verification', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('locality_id');
            $table->integer('expenses_id');
            $table->timestamp('initial_date');
            $table->timestamp('final_date');
            $table->decimal('amount');
            $table->string('active');
            $table->string('changes_user');
            $table->timestamp('changed_date');
            $table->string('approver_user');
            $table->timestamp('approved_date');
            $table->string('status');
            $table->string('rejected_concept');
            $table->string('bill_url');
            $table->string('folio');
            $table->string('kilometers');
            $table->string('odometro');
            $table->string('ticket');
            $table->timestamp('active_date');
            $table->integer('liters');
            $table->string('comments');
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
		Schema::drop('expenses_verification');
	}

}
