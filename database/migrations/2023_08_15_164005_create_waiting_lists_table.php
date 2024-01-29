<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaitingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waiting_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('users')->cascadeOnDelete();

            $table->morphs('courseable');

//            $table->foreignId('course_id');
//            $table->string('course_type'); // 'supporting', 'language', 'intensive'

            $table->boolean('status')->default(0);
            $table->date('date');

            $table->foreignId('group_selected')->nullable()
                ->constrained('groups')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->integer('monthsNumber');

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
        Schema::dropIfExists('waiting_lists');
    }
}
