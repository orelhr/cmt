<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uniform', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->integer('t_shirt');
            $table->string('t_shirt_size');
            $table->integer('t_shirt_quantity');
            $table->integer('jacket');
            $table->string('jacket_size');
            $table->integer('jacket_quantity');
            $table->integer('shirt');
            $table->string('shirt_size');
            $table->integer('shirt_quantity');
            $table->integer('vest');
            $table->string('vest_size');
            $table->integer('vest_quantity');
            $table->timestamp('guard_date');
            $table->string('folio');
            $table->string('active');
            $table->foreign('id_perfil')->references('id')->on('perfil');

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
		Schema::drop('uniform');
	}

}
