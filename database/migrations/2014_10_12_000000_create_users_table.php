<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ip');
            $table->string('hash');
            $table->rememberToken();
            $table->timestamps();
        });

        $this->populateUser();
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

    private function populateUser()
    {
        DB::table('users')->insert([
            'name'      => 'moderator',
            'email'     => 'moderator@example.com',
            'password'  => Hash::make('moderator'),
            'hash'      => Hash::make('moderator'),
            'ip'        => 0
        ]);

        DB::table('users')->insert([
            'name'      => 'manager',
            'email'     => 'manager@example.com',
            'password'  => Hash::make('manager'),
            'hash'      => Hash::make('manager'),
            'ip'        => 0
        ]);
    }
}
