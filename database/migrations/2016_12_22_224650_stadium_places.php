<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StadiumPlaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadium_places', function (Blueprint $table) {
            $table->increments('stadium_id');
            $table->integer('zone_a');
            $table->integer('zone_b');
            $table->integer('zone_c');
            $table->integer('zone_d');
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
        Schema::dropIfExists('stadium_places');
    }
}
