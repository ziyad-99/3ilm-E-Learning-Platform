<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_days', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_id')->references('id')->on('groups')->cascadeOnDelete();

            $table->string('day');
            $table->time('startTime');
            $table->time('endTime');

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
        Schema::dropIfExists('study_days');
    }
}
