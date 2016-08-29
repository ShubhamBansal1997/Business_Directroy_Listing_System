<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Listings;
use App\Categories;
use App\SubCategories;
use App\Location;
 
use App\Http\Requests;
use Illuminate\Http\Request;


class DashboardController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 
    	 if(Auth::user()->usertype=='Admin')	
          {  
        		$categories = Categories::count(); 
        		$subcategories = SubCategories::count(); 
        	 	$location = Location::count(); 
        	 	$users = User::where('usertype', 'User')->count();
                $listings = Listings::count();   

            return view('admin.pages.dashboard',compact('categories','subcategories','location','users','listings'));

	      }
   
    	
        
    }
	
	 
    	
}
