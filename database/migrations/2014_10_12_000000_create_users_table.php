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
            $table->string('firstname');
            $table->string('lastname');
            $table->boolean('gender')->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->string('google_id')->nullable();
            $table->string('validated')->default(0);
            $table->string('validation_token')->nullable();
            $table->string('deleted_at')->nullable();
            $table->string('phone')->nullable();
            $table->string('role')->default(0);
            $table->string('type')->default(0);
            $table->rememberToken();
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
