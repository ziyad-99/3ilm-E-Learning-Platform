<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('session_id')->references('id')->on('sessions')->cascadeOnDelete();

            $table->string('quizName');
            $table->integer('totalQuestions')->nullable();
            $table->string('quizType');
            $table->date('date');
            $table->time('duration');
            $table->integer('markPerQuestion');
            $table->string('status');
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
        Schema::dropIfExists('quizzes');
    }
}
