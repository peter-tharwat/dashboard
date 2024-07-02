<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_certificates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();


            $table->foreignId('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

            $table->foreignId('course_quiz_id')->unsigned();
            $table->foreign('course_quiz_id')->references('id')->on('course_quizzes')->cascadeOnUpdate()->cascadeOnDelete();

            $table->decimal('grade')->default(0);

            $table->enum('status', ['success'])->default('success');

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
        Schema::dropIfExists('course_certificates');
    }
};
