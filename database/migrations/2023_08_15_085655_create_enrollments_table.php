<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('users')->cascadeOnDelete();

            $table->morphs('courseable');
            //$table->foreignId('course_id');
            //$table->string('course_type'); // 'supporting', 'language', 'intensive'

            $table->boolean('status')->default(1);

            $table->foreignId('group_id')->nullable()->default(null)
                ->constrained('groups')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->date('date');
            $table->date('startDate');
            $table->date('endDate');

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
        Schema::dropIfExists('enrollments');
    }
}
