<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->dateTime('phone_verified_at')->nullable();
            $table->string('code')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('rest_password_code')->nullable();
            $table->dateTime('rest_password_code_expired_at')->nullable();
            $table->string('state')->nullable();
            $table->longText('bio')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('status')->default(1);
            $table->string('provider')->nullable();
            $table->string('provider_id', 1000)->nullable();
            $table->string('provider_token', 1000)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('instructors');
    }
}
