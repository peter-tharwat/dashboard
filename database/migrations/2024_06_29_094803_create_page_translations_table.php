<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
			$table->string('meta_description', 500);
			$table->string('title', 255);
			$table->foreignId('page_id');
			$table->foreign('page_id')->references('id')->on('pages')->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('locale')->index();
			$table->unique(['page_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_translations');
    }
};