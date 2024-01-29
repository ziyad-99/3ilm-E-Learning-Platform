<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->longText('content');
            $table->date('date');

            $table->foreignId('student_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('discussion_id')->references('id')->on('discussions')->cascadeOnDelete();
            $table->foreignId('message_id')->nullable()->references('id')->on('messages');

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
        Schema::dropIfExists('messages');
    }
}
