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


class SubCategoriesController extends Controller
{
	
    public function subcategories(Request $request, $category_slug,$sub_category_slug,$sub_cat_id)    { 
        
              
       $listings = Listings::where(array('status'=>'1','sub_cat_id'=>$sub_cat_id))->orderBy('id','desc')->paginate(9);

       $listings->setPath($request->url());
         
       $sub_cat = SubCategories::findOrFail($sub_cat_id);

       return view('pages.listingsbysubcategories',compact('listings','sub_cat'));
    }
    
     
     
     
    	
}
