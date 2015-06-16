<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoDoctos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auto_documents', function(Blueprint $table)
		{
			//
            $table->increments('id');
            $table->string('documentation');
            $table->timestamp('initial_date');
            $table->timestamp('end_date');
            $table->string('active');
		});
        // Crear esquema asigna documentos
        Schema::create('auto_documents_auto',function (Blueprint $table){

            $table->increments('id');
            $table->integer('id_auto_document')->unsigned();
            $table->integer('id_auto')->unsigned();
            $table->timestamp('active_date');
            $table->timestamp('inactive_date');
            $table->string('active');

            $table->foreign('id_auto_document')->references('id')->on('auto_documents');
            $table->foreign('id_auto')->references('id')->on('auto');


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('auto_documents', function(Blueprint $table)
		{
			//
		});
	}

}
