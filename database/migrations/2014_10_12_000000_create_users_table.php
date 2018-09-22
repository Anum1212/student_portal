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
            $table->string('department_id')->nullable();
            $table->string('society_id')->nullable();
            $table->string('name');
            // possible user types
            // 0 -> admin
            // 1 -> subAdmin
            // 2 -> societyAdmin
            // 3 -> student
            $table->integer('userType');
            $table->string('registration')->nullabale();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->string('remember_token');
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
