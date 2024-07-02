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
        Schema::create('course_unit_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')->on('course_unit_quizzes')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('course_unit_questions');
    }
};
