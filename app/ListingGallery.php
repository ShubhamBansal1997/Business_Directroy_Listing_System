<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingGallery extends Model
{
    protected $table = 'listing_gallery';

    protected $fillable = ['listing_id','image_name'];

   
    public $timestamps = false;
	 
}
