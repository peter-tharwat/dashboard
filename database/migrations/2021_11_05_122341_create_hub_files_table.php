<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hub_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade'); 
            $table->string('path')->nullable();
            $table->string('original_name')->nullable();
            $table->string('name')->index();
            $table->string('extension')->nullable();
            $table->integer('size')->nullable();
            $table->timestamp('used_at')->nullable();
            $table->string('getMimeType')->nullable();
            $table->string('type')->nullable();
            $table->string('type_id')->nullable();
            $table->string('is_main')->nullable();
            $table->string('visibility')->nullable();
            $table->string('bucket_name')->nullable();
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
        Schema::dropIfExists('hub_files');
    }
}