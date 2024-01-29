<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->morphs('courseable');

            $table->foreignId('group_id')->nullable()->default(null)
                ->constrained('groups')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->string('meetingID')->nullable()->unique();
            $table->string('attendeePW')->nullable();
            $table->string('moderatorPW')->nullable();

            $table->string('startDate');
//            $table->string('bbbLink')->nullable();
//            $table->string('logoutURL')->nullable();
//            $table->string('endCallbackUrl')->nullable();
            $table->string('recordedLink')->nullable();
            $table->boolean('status')->default(1);

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
        Schema::dropIfExists('sessions');
    }
}
