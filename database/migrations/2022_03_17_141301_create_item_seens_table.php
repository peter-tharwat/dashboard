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
        Schema::create('item_seens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');
            $table->string('ip')->index();
            $table->string('type')->index();
            $table->unsignedBigInteger('type_id')->index();            
            $table->string('traffic_landing')->nullable()->index();  
            $table->string('domain')->nullable()->index();
            $table->string('prev_link')->nullable()->index();
            $table->string('agent_name')->nullable()->index();
            $table->string('browser')->nullable()->index();
            $table->string('device')->nullable()->index();
            $table->string('operating_system')->nullable()->index();
            $table->string('code')->nullable()->index(); 
            $table->string('country_code')->nullable()->index();
            $table->string('country_name')->nullable()->index();
            $table->timestamp('created_at')->index()->useCurrent();
            $table->timestamp('updated_at')->index()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_seens');
    }
};
