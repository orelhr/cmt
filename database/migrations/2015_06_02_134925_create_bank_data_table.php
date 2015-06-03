<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bank_accounts', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->string('name');
            $table->string('branch');
            $table->string('card_number');
            $table->string('interbank_key');
            $table->string('account_number');
            $table->string('active');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bank_accounts', function(Blueprint $table)
		{
			//
		});
	}

}
