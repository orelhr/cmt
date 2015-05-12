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
        Schema::create('autos', function(Blueprint $table)
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
            $table->integer('id_policie')->unsigned();
            $table->timestamps();

            $table->foreign('id_policie')
                ->references('id')
                ->on('policies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('autos');
    }

}
