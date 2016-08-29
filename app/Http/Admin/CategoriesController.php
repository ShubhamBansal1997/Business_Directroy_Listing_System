<?php

namespace App\Http\Controllers\Admin;

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


class CategoriesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function categories()    { 
        
              
        $categories = Categories::orderBy('category_name')->get();
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
 
         
        return view('admin.pages.categories',compact('categories'));
    }
    
    public function addeditCategory()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        

        return view('admin.pages.addeditCategory');
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Input::except(array('_token')) ;
        
        $rule=array(
                'category_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $cat = Categories::findOrFail($inputs['id']);

        }else{

            $cat = new Categories;

        }
        
        
        if($inputs['category_slug']=="")
        {
            $category_slug = str_slug($inputs['category_name'], "-");
        }
        else
        {
            $category_slug =str_slug($inputs['category_slug'], "-"); 
        }
        
        $cat->category_icon = $inputs['category_icon'];
        $cat->category_name = $inputs['category_name']; 
        $cat->category_slug = $category_slug;
         
        
         
        $cat->save();
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editCategory($cat_id)    
    {     
    
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        	     
          $cat = Categories::findOrFail($cat_id);
          
           

          return view('admin.pages.addeditCategory',compact('cat'));
        
    }	 
    
    public function delete($cat_id)
    {
    	if(Auth::User()->usertype=="Admin" or Auth::User()->usertype=="Owner")
        {
        	
        $cat = Categories::findOrFail($cat_id);

        $listings = Listings::where('cat_id',$cat->id)->get();
        
        foreach ($listings as $listing_item) {

                $listing_gallery_obj = ListingGallery::where('listing_id',$listing_item->id)->get();
                
                foreach ($listing_gallery_obj as $listing_gallery) {
                    
                    \File::delete('upload/gallery/'.$listing_gallery->image_name);
                    \File::delete('upload/gallery/'.$listing_gallery->image_name);
                    
                    $listing_gallery_del = ListingGallery::findOrFail($listing_gallery->id);
                    $listing_gallery_del->delete(); 

                    
                }  

        $listing_del = Listings::findOrFail($listing_item->id);
        
        \File::delete('upload/listings/'.$listing_item->featured_image.'-b.jpg');
        \File::delete('upload/listings/'.$listing_item->featured_image.'-s.jpg');    

        $listing_del->delete(); 

        } 


        $cat->delete();

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        
        }
    }

     
     
    	
}
