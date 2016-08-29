<?php

namespace App;
use App\Listings;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'listings_reviews';

    protected $fillable = ['user_id', 'listing_id','reviews_title','review','rating','date'];


	public $timestamps = false;
    
	public static function getTotalReview($listing_id) 
    { 
		 $total_review = Reviews::where("listing_id", $listing_id)->count();

		 return $total_review;
	}
	
	public static function checkUserReview($user_id,$listing_id) 
    { 
		 $user_review = Reviews::where("user_id", $user_id)->where("listing_id", $listing_id)->first();

		 return $user_review;
	}	 
}
