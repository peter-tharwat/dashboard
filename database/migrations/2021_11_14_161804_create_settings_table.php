<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->longText('value')->nullable();
            $table->integer('order')->default(0);
            $table->string('category')->default("OTHER");

            /*$table->string('website_name')->nullable();
            $table->string('website_logo')->nullable();
            $table->string('website_wide_logo')->nullable();
            $table->string('website_icon')->nullable();
            $table->string('website_cover')->nullable();
            $table->text('address')->nullable();
            $table->text('website_bio')->nullable();
            

            //contact
            $table->text('contact_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('whatsapp_phone')->nullable();

            //social
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('telegram_link')->nullable();
            $table->text('whatsapp_link')->nullable();
            $table->text('tiktok_link')->nullable();
            $table->text('upwork_link')->nullable();
            $table->text('nafezly_link')->nullable();
            $table->text('linkedin_link')->nullable();
            $table->text('github_link')->nullable();


            //pages 
            $table->longText('contact_page')->nullable();

            //other links
            $table->text('another_link1')->nullable();
            $table->text('another_link2')->nullable();
            $table->text('another_link3')->nullable();

            //colors
            $table->string('main_color')->default('#0194fe');
            $table->string('hover_color')->default('#0194fe');
            $table->string('dashboard_dark_mode')->default(0);
            

            //code
            $table->longText('header_code')->nullable();
            $table->longText('footer_code')->nullable();
            $table->longText('robots_txt')->nullable();*/


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
        Schema::dropIfExists('settings');
    }
}
