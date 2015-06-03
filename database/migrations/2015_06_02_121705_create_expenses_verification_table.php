<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesVerificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses_verification', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->integer('id_location')->unsigned();
            $table->integer('id_expenses')->unsigned();
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->float('importe');
            $table->string('active');
            $table->string('modified_user');
            $table->timestamp('modified_date');
            $table->string('approving_user');
            $table->timestamp('approving_date');
            $table->smallInteger('approve');
            $table->string('reject_concept');
            $table->string('bill');
            $table->string('folio');
            $table->string('km');
            $table->string('odometro');
            $table->text('ticket');
            $table->text('sat');
            $table->timestamp('active_date');
            $table->integer('books');
            $table->text('details');


            $table->foreign('id_perfil')->references('id')->on('perfil');
            $table->foreign('id_location')->references('id')->on('location');
            $table->foreign('id_expenses')->references('id')->on('expenses');


		});

        Schema::create('service_record', function(Blueprint $table ){

            $table->increments('id');
            $table->integer('id_auto')->unsigned();
            $table->integer('id_expenses_verification')->unsigned();
            $table->timestamp('active_date');
            $table->timestamp('inactive_date');
            $table->string('active');


            $table->foreign('id_auto')->references('id')->on('auto');
            $table->foreign('id_expenses_verification')->references('id')->on('expenses_verification');


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('service_record', function(Blueprint $table){

        });
		Schema::drop('expenses_verification', function(Blueprint $table)
		{
			//
		});
	}

}
