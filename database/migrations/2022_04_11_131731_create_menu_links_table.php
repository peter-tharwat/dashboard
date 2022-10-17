<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->foreign('menu_id')->references('id')->on("menus")->onDelete('cascade');
            $table->unsignedBigInteger('menu_link_id')->nullable();
            $table->foreign('menu_link_id')->references('id')->on("menu_links")->onDelete('cascade');

            $table->string("type")->default('CUSTOM_LINK');//['CUSTOM_LINK','PAGE','CATEGORY']
            $table->integer('type_id')->nullable();
            $table->string("title")->nullable();
            $table->string('url')->nullable();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            
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
        Schema::dropIfExists('menu_links');
    }
};
