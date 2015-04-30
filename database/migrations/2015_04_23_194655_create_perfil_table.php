<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Perfil', function(Blueprint $table)
		{
			$table->increments('id_perfil');
            $table->string('nombre_perfil');
            $table->string('apellido_paterno');
            $table->string('fotografia');
            $table->string('apellido_materno');
            $table->string('fotografia');
            $table->string('telefono');
            $table->string('correo');
            $table->string('correo_cmt');
            $table->string('password_chat');
            $table->string('ife');
            $table->string('curp');
            $table->string('rfc');
            $table->timestamp('fecha_nacimiento');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('profesion');
            $table->string('cedula');
            $table->string('licencia_conducir');
            $table->timestamp('fecha_vencimiento');
            $table->string('telefono-emergencias');
            $table->string('tipo_sangre');
            $table->string('vigencia_contrato');
            $table->string('usuario_modifica');
            $table->string('env');
            $table->string('direccion');
            $table->string('departamento');
            $table->float('zona');

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
		Schema::drop('Perfil');
	}

}
