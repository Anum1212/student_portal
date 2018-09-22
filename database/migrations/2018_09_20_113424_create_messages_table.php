<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('sender_id');
            $table->string('sender_name');
            // possible sender_type
            // 0 - > Super Admin
            // 1 - > Dept Admin
            // 2 - > Society Admin
            // 3 - > Student
            $table->integer('sender_type');
            $table->integer('receiver_id');
            // possible receiver_type
            // 0 - > Super Admin
            // 1 - > Dept Admin
            // 2 - > Society Admin
            // 3 - > Student
            $table->integer('receiver_type');
            // possible message_type
            // 0 - > reply
            // 1 - > Query
            // 2 - > Suggestion
            $table->integer('message_type');
            $table->integer('replied_to_message_id');
            $table->string('title');
            $table->longText('message');
            // possible message_status
            // 0 - > unread
            // 1 - > read
            // 2 - > replied
            $table->integer('message_status')->default('0');
            $table->string('file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
