<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_limits', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');
            $table->string('traffic_landing')->nullable();  
            $table->string('domain')->nullable();
            $table->string('prev_link')->nullable();

            $table->string('ip')->index();

            $table->string('agent_name')->nullable()->index();
            $table->string('browser')->nullable()->index();
            $table->string('device')->nullable()->index();
            $table->string('operating_system')->nullable()->index();
 
            $table->string('code')->nullable(); 
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();  
            $table->string('note')->nullable();
            $table->timestamps();
        });
        Schema::table('rate_limits', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_limits');
    }
}
