<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->longText('bio')->nullable();
            $table->integer('blocked')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_activity')->nullable()->index();
            $table->string('password');
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            
            $table->foreign('country_id')->references('id')->on('marketopia_countries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('city_id')->references('id')->on('marketopia_cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
