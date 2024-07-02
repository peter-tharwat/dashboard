<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('article_translations', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
			$table->text('meta_description');
			$table->string('title');
			$table->foreignId('article_id');
			$table->foreign('article_id')->references('id')->on('articles')->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('locale')->index();
			$table->unique(['article_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_translations');
    }
};