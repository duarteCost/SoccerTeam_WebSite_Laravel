<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('game_id');
            $table->integer('homeTeam_id')->default(1);
            $table->integer('awayTeam_id');
            $table->dateTime('date');
            $table->integer('stadium_id')->unsigned();
            $table->foreign('stadium_id')->references('stadium_id')->on('stadium_places')->onDelete('no action')->onUpdate('no action');
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
        Schema::dropIfExists('games');
    }
}
