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
        Schema::create('course_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_quiz_question_id')->unsigned();
            $table->foreign('course_quiz_question_id')->references('id')->on('course_quiz_questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('answer');
            $table->boolean('is_correct')->default(false);
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
        Schema::dropIfExists('course_quiz_answers');
    }
};
