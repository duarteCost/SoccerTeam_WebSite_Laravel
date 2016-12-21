<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gameID')->references('game_id')->on('games')->onDelete('no action')->onUpdate('no action');
            $table->dateTime('date');
            $table->double('price');
            $table->string('bench');
            $table->string('stadiumID')->references('stadium_id')->on('stadium')->onDelete('no action')->onUpdate('no action');
            $table->integer('amount');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
