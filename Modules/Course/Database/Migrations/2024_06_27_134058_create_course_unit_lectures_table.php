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
        Schema::create('course_unit_lectures', function (Blueprint $table) {
            $table->id();
            
            $table->enum('type', ['video', 'audio', 'pdf', 'text', 'live'])->default('video');
            $table->enum('video_type', ['uploaded', 'iframe'])->default('uploaded');
            $table->string('file')->nullable();
            $table->integer('duration')->default(0);
            $table->integer('position')->default(0);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->string('video_url')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('text')->nullable();
            $table->string('live_url')->nullable();

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
        Schema::dropIfExists('course_unit_lectures');
    }
};
