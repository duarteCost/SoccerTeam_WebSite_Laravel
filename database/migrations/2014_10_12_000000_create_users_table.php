<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('type')->default(0);
            $table->float('amount')->default(50.00);
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
            array(
                'email' => 'socio@me.com',
                'name' => 'socio',
                'password' => '$2y$10$DEFVLOJyqvcFyktkoMIVpenUffVxVp8DTLXnS5SP8puJA5oUC6ao6',
                'type' => '0',
                'amount' => '50',
                'remember_token' => 'jyboRSaqoDZWT3i7aZTn4ii7IC6S2r9dVKQL6vOn80I696G148YLUAZ668Ky',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('users')->insert(
            array(
                'email' => 'b@gmail.com',
                'name' => 'afonso',
                'password' => '$2y$10$KxOmKIpgzDg2el0io6mOieSXlDlWyFIOsx2jZCVFTCTut./HmwBAG',
                'type' => '0',
                'amount' => '50',
                'remember_token' => 'jyboRSaqoDZWT3i7aZTn3ii7IC6S2r9dVKQL6vOn80I696G148YLUAZ668Ky',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('users')->insert(
            array(
                'email' => 'admin@me.com',
                'name' => 'Admin',
                'password' => '$2y$10$jxxLJGlnh5uKuTaqJGhFouue2HLTfr.ix.AnpAKLM9fADuUAV.jeW',
                'type' => '1',
                'amount' => '50',
                'remember_token' => '3ldwaM3l0BYxyrbcWp3FQVC6BLYvk9G1DJPPSI0PIqJlm7nZ8cPavxwCJ23N',
                'created_at' => '2016-12-22 13:22:42',
                'updated_at' => '2016-12-22 13:22:42'
            )
        );

        DB::table('users')->insert(
            array(
                'email' => 'dc@me.com',
                'name' => 'Duarte Costa',
                'password' => '$2y$10$MSLQWe3JbIkuOCc99QOxKOYM5IkMJMPTiAHfkKiPqa/5WuUG5XQ4q',
                'type' => '1',
                'amount' => '50',
                'remember_token' => '$2y$10$MSLQWe3JbIkuOCc99QOxKOYM5IkMJMPTiAHfkKiPqa/5WuUG5XQ4q',
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
        Schema::dropIfExists('users');
    }
}
