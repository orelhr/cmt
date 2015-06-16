<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Modelo "CARRO"
        Schema::create('auto', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('branch');
            $table->string('model');
            $table->string('serie');
            $table->string('plates');
            $table->string('engine_number');
            $table->string('accessories');
            $table->string('type');
            $table->string('details');
            $table->timestamp('active_date');
            $table->timestamp('inactive_date');
            $table->string('active');
            $table->string('inactivity');
            $table->integer('id_policy')->unsigned();
            $table->timestamps();

            $table->foreign('id_policy')
                ->references('id')
                ->on('policy');
        });

        // Crea esquema assigna_coche

        Schema::create('auto_perfil',function(Blueprint $table){

            $table->increments('id');
            $table->integer('id_perfil')->unsigned();
            $table->integer('id_auto')->unsigned();
            $table->timestamp('active_date');
            $table->timestamp('inactive_date');
            $table->string('active');

            $table->foreign('id_perfil')->references('id')->on('perfil');
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

        Schema::drop('auto_perfil');
        Schema::drop('auto');
    }

}
