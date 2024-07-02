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
        Schema::create('course_unit_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')->on('course_unit_quizzes')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('score');
            $table->integer('total_questions');
            $table->integer('correct_answers');
            $table->integer('wrong_answers');
            $table->enum('status', ['passed', 'failed'])->default('failed');
            $table->timestamp('finished_at')->nullable();

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
        Schema::dropIfExists('course_unit_results');
    }
};
