<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('announcement_translations', function (Blueprint $table) {
            $table->id();
            $table->text('description');
			$table->string('title');
			$table->foreignId('announcement_id');
			$table->foreign('announcement_id')->references('id')->on('announcements')->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('locale')->index();
			$table->unique(['announcement_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('announcement_translations');
    }
};