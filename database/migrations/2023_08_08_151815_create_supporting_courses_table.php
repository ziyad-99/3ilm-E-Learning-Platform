<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportingCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporting_courses', function (Blueprint $table) {
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
            $table->string('year');
            $table->integer('numberSessions');
            $table->string('branch')->nullable();
            $table->time('frameTime');
            $table->date('startDate');
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
        Schema::dropIfExists('supporting_courses');
    }
}
