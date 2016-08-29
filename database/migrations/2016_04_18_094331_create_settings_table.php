<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');                
            $table->string('site_name');            
            $table->string('site_email');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('site_description');
            $table->string('google_map_api');
            $table->text('site_header_code');
            $table->text('site_footer_code');
            $table->string('site_copyright');
            $table->text('addthis_share_code');
            $table->text('disqus_comment_code');
            $table->text('facebook_comment_code');             
            $table->string('home_slide_image1');
            $table->string('home_slide_image2');
            $table->string('home_slide_image3');
            $table->string('home_slide_title');
            $table->text('home_slide_text');
            $table->string('page_bg_image');
            $table->string('about_title');
            $table->longtext('about_description');
            $table->string('contact_title');
            $table->text('contact_address');
            $table->string('contact_email');
            $table->string('contact_number');
            $table->string('contact_lat');
            $table->string('contact_long');
            $table->string('terms_of_title');
            $table->longtext('terms_of_description');
            $table->string('privacy_policy_title');
            $table->longtext('privacy_policy_description');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('gplus_url');
            $table->string('linkedin_url');
 
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('settings');
    }
}
