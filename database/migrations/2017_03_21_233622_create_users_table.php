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
            $table->string('username');
            $table->string('email');
            $table->rememberToken();
            $table->string('password');
            $table->integer('enabled');
            $table->dateTime('last_login')->nullable();
            $table->dateTime('expired')->nullable();
            $table->integer('role');
            $table->string('company')->nullable();
            $table->dateTime('logged_in')->nullable();
            $table->integer('package');
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
        Schema::dropIfExists('users');
    }
}
