<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('cat_id');
            $table->integer('sub_cat_id');
            $table->integer('location_id'); 
            $table->integer('featured_listing')->length(1);               
            $table->string('title');
            $table->string('listing_slug');
            $table->longtext('description');
            $table->text('video');
            $table->text('address');
            $table->string('map_lat');
            $table->string('map_long');
            $table->text('amenities');
            $table->string('working_hours_mon');
            $table->string('working_hours_tue');
            $table->string('working_hours_wed');
            $table->string('working_hours_thurs');
            $table->string('working_hours_fri');
            $table->string('working_hours_sat');
            $table->string('working_hours_sun');
            $table->string('featured_image');  
            $table->string('review_avg');  
            $table->integer('status')->length(1);  
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
        Schema::drop('listings');
    }
}
