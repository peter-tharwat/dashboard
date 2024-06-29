<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('faq_translations', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
			$table->tinyText('question');
			$table->foreignId('faq_id');
			$table->foreign('faq_id')->references('id')->on('faqs')->cascadeOnUpdate()->cascadeOnDelete();
			$table->string('locale')->index();
			$table->unique(['faq_id', 'locale']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_translations');
    }
};