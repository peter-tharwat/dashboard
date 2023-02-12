<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateLimitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_limit_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');
            $table->unsignedBigInteger('rate_limit_id')->nullable();
            $table->foreign('rate_limit_id')->references('id')->on("rate_limits")->onDelete('cascade');
            $table->text('query')->nullable();
            $table->string('url')->nullable()->index();
            $table->string('ip')->index();
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
        Schema::dropIfExists('rate_limit_details');
    }
}
