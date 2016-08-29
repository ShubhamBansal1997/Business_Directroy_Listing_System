<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Listings;
use App\Categories;
use App\SubCategories;
use App\Location;
use App\ListingGallery;
use App\Reviews;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 


class CategoriesController extends Controller
{
	
    public function categories(Request $request, $category_slug,$cat_id)    { 
        
              
       $listings = Listings::where(array('status'=>'1','cat_id'=>$cat_id))->orderBy('id','desc')->paginate(9);

       $listings->setPath($request->url());
         
       $cat = Categories::findOrFail($cat_id);

       return view('pages.listingsbycategories',compact('listings','cat'));
    }
    
     
     
     
    	
}
