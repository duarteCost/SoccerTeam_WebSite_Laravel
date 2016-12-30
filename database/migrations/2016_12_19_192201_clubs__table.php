<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('club_id');
            $table->string('club_name');
            $table->string('club_title');
            $table->string('club_path');
        });

        DB::table('clubs')->insert(
            array(
                'club_name' => 'Real Madrid CF',
                'club_title' => 'Rm_mediano.png',
                'club_path'=> 'clubs'
            )
        );

        DB::table('clubs')->insert(
            array(
                'club_name' => 'Valencia CF',
                'club_title' => 'granada_mediano.png',
                'club_path'=> 'clubs'
            )
        );

        DB::table('clubs')->insert(
            array(
                'club_name' => 'Málaga CF',
                'club_title' => 'malaga_mediano.png',
                'club_path'=> 'clubs'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clubs');
    }
}
