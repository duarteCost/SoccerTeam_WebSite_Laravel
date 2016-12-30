<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_img', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->string('title');
            $table->string('path');
            $table->integer('new_id')->unsigned();
            $table->foreign('new_id')->references('id')->on('news')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });


        DB::table('new_img')->insert(
            array(
                'id'=> '5',
                'type' => '1',
                'title' => 'ronaldopepe1.jpg',
                'path' => 'news/',
                'new_id'=> '9',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('new_img')->insert(
            array(
                'id'=> '6',
                'type' => '1',
                'title' => 'ZidaneAP2.jpg',
                'path' => 'news/',
                'new_id'=> '13',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('new_img')->insert(
            array(
                'id'=> '7',
                'type' => '1',
                'title' => 'xabialonsogolo.jpg',
                'path' => 'news/',
                'new_id'=> '10',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('new_img')->insert(
            array(
                'id'=> '9',
                'type' => '1',
                'title' => '1480778570.jpg',
                'path' => 'news/',
                'new_id'=> '5',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );


        DB::table('new_img')->insert(
            array(
                'id'=> '10',
                'type' => '0',
                'title' => '1482690403.jpg',
                'path' => 'news/',
                'new_id'=> '14',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('new_img')->insert(
            array(
                'id'=> '11',
                'type' => '1',
                'title' => '1482690404.jpg',
                'path' => 'news/',
                'new_id'=> '14',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );


        DB::table('new_img')->insert(
            array(
                'id'=> '12',
                'type' => '1',
                'title' => '1482691112.jpg',
                'path' => 'news/',
                'new_id'=> '15',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('new_img')->insert(
            array(
                'id'=> '13',
                'type' => '1',
                'title' => '1482691113.jpg',
                'path' => 'news/',
                'new_id'=> '15',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
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
        Schema::dropIfExists('new_img');
    }
}
