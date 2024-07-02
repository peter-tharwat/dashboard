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
        Schema::create('course_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('description')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->integer('duration')->default(0);
            $table->boolean('has_')->default(0);
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
        Schema::dropIfExists('course_quizzes');
    }
};
