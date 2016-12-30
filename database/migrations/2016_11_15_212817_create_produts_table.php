<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price');
            $table->timestamps();
        });


        DB::table('produts')->insert(
            array(
                'id'=> '14',
                'name' => 'Pins',
                'price' => '5',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('produts')->insert(
            array(
                'id'=> '13',
                'name' => 'Bandeira',
                'price' => '25',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('produts')->insert(
            array(
                'id'=> '12',
                'name' => 'Caneca',
                'price' => '15',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('produts')->insert(
            array(
                'id'=> '11',
                'name' => 'T-shirt',
                'price' => '50',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('produts')->insert(
            array(
                'id'=> '15',
                'name' => 'Calções',
                'price' => '35',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('produts')->insert(
            array(
                'id'=> '16',
                'name' => 'Pin',
                'price' => '2.5',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('produts')->insert(
            array(
                'id'=> '17',
                'name' => 'Chaveiro',
                'price' => '5',
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
        Schema::dropIfExists('produts');
    }
}
