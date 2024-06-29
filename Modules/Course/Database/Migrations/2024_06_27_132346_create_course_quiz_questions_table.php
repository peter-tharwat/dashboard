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
        Schema::create('course_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_quiz_id')->unsigned();
            $table->foreign('course_quiz_id')->references('id')->on('course_quizzes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('question');
            
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
        Schema::dropIfExists('course_quiz_questions');
    }
};
