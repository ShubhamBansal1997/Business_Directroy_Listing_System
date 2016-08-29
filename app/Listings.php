<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    protected $table = 'listings';

    protected $fillable = ['user_id','cat_id','sub_cat_id','location__id','featured_listing','title','listing_slug','description','address','video','map_lat','map_long','amenities','working_hours_mon','working_hours_tue','working_hours_wed','working_hours_thurs','working_hours_fri','working_hours_sat','working_hours_sun','featured_image','review_avg','status'];


	//public $timestamps = false;
   
   public function scopeSearchByKeyword($query, $keyword,$location)
    {
        if ($keyword!='' and $location!='') {
            $query->where(function ($query) use ($keyword,$location) {
                $query->where("title", "LIKE","%$keyword%")
                    ->where("location_id", "$location")
                    ->where("status", "1");                     
            });
        }
        else
        {
        	 
        	$query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                ->where("status", "1");
                                    
            });
        }
        return $query;
    }

    public function scopeSearchByFilter($query, $category,$rating)
    {
        if ($category!='' and $rating!='') {
            $query->where(function ($query) use ($category,$rating) {
                $query->where("cat_id", "$category")
                    ->where("review_avg", "$rating")
                    ->where("status", "1");                     
            });
        }
        elseif ($category!='') {
            $query->where(function ($query) use ($category) {
                $query->where("cat_id", "$category")
                ->where("status", "1");
                                    
            });
        }
        else
        {
             
            $query->where(function ($query) use ($rating) {
                $query->where("review_avg", "$rating")->where("status", "1");
                                    
            });
        }
        return $query;
    }
}
