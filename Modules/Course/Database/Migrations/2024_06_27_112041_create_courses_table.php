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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            // Currency code
            $table->string('currency', 4)->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');

            // Course Price
            $table->decimal('price', 13, 3)->default(0);

            $table->foreignId('course_category_id')->unsigned();
            $table->foreign('course_category_id')->references('id')->on('course_categories')->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('instructor_id')->unsigned();
            $table->foreign('instructor_id')->references('id')->on('instructors')->cascadeOnDelete()->cascadeOnUpdate();


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
        Schema::dropIfExists('courses');
    }
};
