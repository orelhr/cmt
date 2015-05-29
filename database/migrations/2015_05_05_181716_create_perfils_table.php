<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfil', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('second_lastname');
            $table->string('picture_url');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('cmt_email');
            $table->string('ife');
            $table->string('curp');
            $table->string('rfc');
            $table->timestamp('birthdate');
            $table->string('sexo');
            $table->string('civil_status');
            $table->string('occupation');
            $table->string('license');
            $table->string('driver_license');
            $table->timestamp('expiration_date');
            $table->string('emergency_phone');
            $table->string('blood_type');
            $table->string('active');
            $table->string('status');
            $table->string('perfil');
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
		Schema::drop('perfil');
	}

}
