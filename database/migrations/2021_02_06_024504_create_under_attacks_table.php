<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnderAttacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('under_attacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->default('UNDER_ATTACK');
            $table->text('note')->nullable();
            $table->timestamp('release_at');
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
        Schema::dropIfExists('under_attacks');
    }
}
