<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentAssignment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipment_assignment', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->integer('id_equipment')->unsigned();
            $table->timestamp('guard_date');
            $table->integer('active');
            $table->timestamps();

            $table->foreign('id_perfil')
                ->references('id')
                ->on('perfil');
            $table->foreign('id_equipment')
                ->references('id')
                ->on('equipment');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('equipment_assignment', function(Blueprint $table)
		{
			//
		});
	}

}
