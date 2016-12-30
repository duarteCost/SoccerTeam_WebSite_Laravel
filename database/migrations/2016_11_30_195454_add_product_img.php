<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_img', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('path');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('produts')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });


        DB::table('product_img')->insert(
            array(
                'id'=> '4',
                'title' => '1480777363.png',
                'path' => 'products/',
                'product_id'=> '13',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('product_img')->insert(
            array(
                'id'=> '2',
                'title' => '1480776992.png',
                'path' => 'products/',
                'product_id'=> '11',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('product_img')->insert(
            array(
                'id'=> '3',
                'title' => '1480777182.png',
                'path' => 'products/',
                'product_id'=> '12',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('product_img')->insert(
            array(
                'id'=> '5',
                'title' => '1480777895.png',
                'path' => 'products/',
                'product_id'=> '14',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('product_img')->insert(
            array(
                'id'=> '6',
                'title' => '1480778063.png',
                'path' => 'products/',
                'product_id'=> '15',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('product_img')->insert(
            array(
                'id'=> '7',
                'title' => '1480778145.png',
                'path' => 'products/',
                'product_id'=> '16',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('product_img')->insert(
            array(
                'id'=> '8',
                'title' => '1480778194.png',
                'path' => 'products/',
                'product_id'=> '17',
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
        Schema::dropIfExists('product_img');
    }
}
