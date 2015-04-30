<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipment', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('branch');
            $table->string('model');
            $table->string('validity');
            $table->string('provider_name');
            $table->string('provider_phone');
            $table->timestamp('purchase_date');
            $table->string('serie');
            $table->string('description');
            $table->string('active');
            $table->string('initial_date');
            $table->string('final_date');
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
		Schema::drop('equipment');
	}

}
