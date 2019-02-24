<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
        });

        $this->populateUserRoles();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }

    private function populateUserRoles()
    {
        DB::table('user_roles')->insert([
            'user_id'      => 1,
            'role_id'      => 1
        ]);

        DB::table('user_roles')->insert([
            'user_id'      => 1,
            'role_id'      => 2
        ]);

        DB::table('user_roles')->insert([
            'user_id'      => 2,
            'role_id'      => 2
        ]);
    }
}
