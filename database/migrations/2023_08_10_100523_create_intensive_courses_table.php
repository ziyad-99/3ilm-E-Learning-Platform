<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntensiveCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intensive_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instructor_id')->references('id')->on('instructors')->cascadeOnDelete();
            $table->string('paymentType');
            $table->string('perSession')->nullable();
            $table->string('percentage')->nullable();

            $table->longText('title');
            $table->longText('description');
            $table->string('img')->nullable();
            $table->boolean('status');
            $table->integer('price');
            $table->string('level');
            $table->integer('numberSessions');
            $table->string('startDate');
            $table->time('frameTime');
            $table->string('slug');
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
        Schema::dropIfExists('intensive_courses');
    }
}
