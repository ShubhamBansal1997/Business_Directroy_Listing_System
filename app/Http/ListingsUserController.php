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
use Illuminate\Support\Facades\DB;

class ListingsUserController extends Controller
{
	 
    public function listings(Request $request)    { 
        
              
        $listings = Listings::where('status','1')->orderBy('id','desc')->paginate(9);

        $listings->setPath($request->url());
         
        return view('pages.listings',compact('listings'));
    }

    public function single_listing($listing_slug,$listing_id)    { 
        
        $listing = Listings::where(array('status'=>'1','id'=>$listing_id))->first();
 
        $listing_gallery_images = ListingGallery::where('listing_id',$listing_id)->orderBy('id')->get();

        $listing_reviews = Reviews::where('listing_id',$listing_id)->orderBy('id','desc')->get();

        return view('pages.single_listing',compact('listing','listing_gallery_images','listing_reviews'));
    }

    public function search_listings(Request $request)    
    { 
        
              
        //$restaurants = Restaurants::orderBy('restaurant_name')->get();
        $inputs = $request->all();

       $keyword = $inputs['search_keyword'];
       $location = $inputs['location'];

       //$listings = Listings::where(array('title'=>$keyword,'location_id'=>$location))->get();

       $listings = Listings::SearchByKeyword($keyword,$location)->get();

       $total_res=count($listings);  
         
        return view('pages.search',compact('listings','total_res','keyword'));
    }

    public function search_filter_listings(Request $request)    
    { 
        
              
        //$restaurants = Restaurants::orderBy('restaurant_name')->get();
        $inputs = $request->all();

       $category = $inputs['category'];
       
       if(isset($inputs['rating']))
       {

            $rating = $inputs['rating'];

       }
       else
       {

        $rating = '';

       }
       

       //$listings = Listings::where(array('title'=>$keyword,'location_id'=>$location))->get();

       $listings = Listings::SearchByFilter($category,$rating)->get();

       $total_res=count($listings);  
         
        return view('pages.search_filter',compact('listings','total_res','category'));
    }

    public function user_listings(Request $request)    { 
        
       if(!Auth::check())
       {

            \Session::flash('flash_message', 'Access denied!');

            return redirect('login');
            
        }

        $user_id= Auth::User()->id;

        $listings = Listings::where('user_id',$user_id)->orderBy('id')->paginate(10);
        
        $listings->setPath($request->url());

        return view('pages.mylisting',compact('listings'));
    }
    
    public function submit_listing()    { 
        
         if(!Auth::check())
       {

            \Session::flash('flash_message', 'Access denied!');

            return redirect('login');
            
        }

        $categories = Categories::orderBy('category_name')->get();

        $locations = Location::orderBy('location_name')->get();

        return view('pages.addeditlisting',compact('categories','locations'));
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Input::except(array('_token')) ;
        
        $rule=array(                               
                'title' => 'required',
                'category' => 'required',
                'sub_category' => 'required',
                'location' => 'required',
                'description' => 'required',
                'featured_image' => 'mimes:jpg,jpeg,gif,png'
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $listings = Listings::findOrFail($inputs['id']);

        }else{

            $listings = new Listings;

        }
        
        $listing_slug = str_slug($inputs['title'], "-");
        
        //Featured image
        $featured_image = $request->file('featured_image');
         
        if($featured_image){
            
            \File::delete(public_path() .'/upload/listings/'.$listings->featured_image.'-b.jpg');
            \File::delete(public_path() .'/upload/listings/'.$listings->featured_image.'-s.jpg');
            
            $tmpFilePath = 'upload/listings/';          
             
            $hardPath = substr($listing_slug,0,100).'_'.time();
            
            $img = Image::make($featured_image);

            $img->save($tmpFilePath.$hardPath.'-b.jpg');
            
            $img->fit(300, 300)->save($tmpFilePath.$hardPath. '-s.jpg');

            $listings->featured_image = $hardPath;
             
        }

        if(empty($inputs['id'])){
           
            $listings->user_id = Auth::User()->id;

        } 

        $listings->cat_id = $inputs['category'];
        $listings->sub_cat_id = $inputs['sub_category'];
        $listings->location_id = $inputs['location']; 
        $listings->title = $inputs['title']; 
        $listings->listing_slug = $listing_slug;
        $listings->description = $inputs['description'];
        $listings->address = $inputs['address'];
        $listings->map_lat = $inputs['latitude'];
        $listings->map_long = $inputs['lontgitude'];
        $listings->working_hours_mon = $inputs['working_hours_mon'];
        $listings->working_hours_tue = $inputs['working_hours_tue'];
        $listings->working_hours_wed = $inputs['working_hours_wed'];
        $listings->working_hours_thurs = $inputs['working_hours_thurs'];
        $listings->working_hours_fri = $inputs['working_hours_fri'];
        $listings->working_hours_sat = $inputs['working_hours_sat'];
        $listings->working_hours_sun = $inputs['working_hours_sun'];
        $listings->video = $inputs['video'];
        $listings->amenities = $inputs['amenities'];
          
        $listings->save();
        

         //News Gallery image
        $listing_gallery_files = $request->file('gallery_file');
        
        $file_count = count($listing_gallery_files);
         
        if($request->hasFile('gallery_file'))
        {

            if(!empty($inputs['id']))
            {

                foreach($listing_gallery_files as $file) {
                    
                    $listing_gallery_obj = new ListingGallery;
                    
                    $tmpFilePath = 'upload/gallery/';           
                     
                    $hardPath = substr($listing_slug,0,100).'_'.rand(0,9999).'-b.jpg';
                    
                    $g_img = Image::make($file);

                    $g_img->save($tmpFilePath.$hardPath);
                    

                    $listing_gallery_obj->listing_id = $inputs['id'];
                    $listing_gallery_obj->image_name = $hardPath;
                    $listing_gallery_obj->save();
                     
                }

            }
            else
            {   
                foreach($listing_gallery_files as $file) {
                    
                    $listing_gallery_obj = new ListingGallery;
                    
                    $tmpFilePath = 'upload/gallery/';           
                     
                    $hardPath = substr($listing_slug,0,100).'_'.rand(0,9999).'-b.jpg';
                    
                    $g_img = Image::make($file);

                    $g_img->save($tmpFilePath.$hardPath);
                    
                    $listing_gallery_obj->listing_id = $listings->id;
                    $listing_gallery_obj->image_name = $hardPath;
                    $listing_gallery_obj->save();
                     
                }
            }
        }

        if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Listing Added');

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editlisting($listing_id)    
    {     
          

          if(!Auth::check())
             {

                \Session::flash('flash_message', 'Access denied!');

                return redirect('login');
            
             }    
           
          $listing = Listings::findOrFail($listing_id);
            
           if($listing->user_id!=Auth::User()->id and Auth::User()->usertype!="Admin")
             {

                \Session::flash('flash_message', 'Access denied!');

                return redirect('dashboard');
            
             }

          
          $categories = Categories::orderBy('category_name')->get(); 

          $subcategories = SubCategories::where('cat_id',$listing->cat_id)->orderBy('sub_category_name')->get();

          $locations = Location::orderBy('location_name')->get();

          $listing_gallery_images = ListingGallery::where('listing_id',$listing->id)->orderBy('image_name')->get();


          return view('pages.addeditlisting',compact('listing','categories','subcategories','locations','listing_gallery_images'));
        
    }	 
    
    public function delete($listing_id)
    {
    	if(Auth::User()->usertype=="Admin" or Auth::User()->usertype=="User")
        {
        	
        $listing = Listings::findOrFail($listing_id);
        

        $listing_gallery_obj = ListingGallery::where('listing_id',$listing->id)->get();
        
        foreach ($listing_gallery_obj as $listing_gallery) {
            
            \File::delete('upload/gallery/'.$listing_gallery->image_name);
            \File::delete('upload/gallery/'.$listing_gallery->image_name);
            
            $listing_gallery_del = ListingGallery::findOrFail($listing_gallery->id);
            $listing_gallery_del->delete(); 

            
        }   

        
        \File::delete(public_path() .'/upload/listings/'.$listing->featured_image.'-b.jpg');
        \File::delete(public_path() .'/upload/listings/'.$listing->featured_image.'-s.jpg');    

        $listing->delete();

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        
        }
    }

    public function gallery_image_delete($id)
    {
        
        $listing_gallery_obj = ListingGallery::findOrFail($id);
        
        \File::delete('upload/gallery/'.$listing_gallery_obj->image_name);
         
        $listing_gallery_obj->delete(); 

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }
     
    public function ajax_subcategories($cat_id)    { 
        
        //$cat_id = \Input::get('cat_id');
              
        $subcategories = SubCategories::where('cat_id',$cat_id)->orderBy('sub_category_name')->get();

         
        return view('pages.ajax_subcategories',compact('subcategories'));
    } 



    public function submit_review(Request $request)
    { 
        
        $data =  \Input::except(array('_token')) ;
        
        $rule=array(
                'rating' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
    
        $review = new Reviews;

      
        $review->user_id = Auth::User()->id;
        $review->listing_id = $inputs['listing_id'];
        $review->reviews_title = $inputs['reviews_title']; 
        $review->review = $inputs['review']; 
        $review->rating = $inputs['rating']; 
        $review->date= strtotime(date('Y-m-d'));  
          
        $review->save();

        $total_avg=round(DB::table('listings_reviews')->where('listing_id', $inputs['listing_id'])->avg('rating'));

        $listing_obj = Listings::findOrFail($inputs['listing_id']);

        $listing_obj->review_avg = $total_avg;  
        $listing_obj->save(); 
        
        
            \Session::flash('flash_message', 'Review submitted');

            return \Redirect::back();
                   
        
         
    }
    
    public function inquiry_send(Request $request)
    { 
        
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        $rule=array(                
                'name' => 'required',
                'email' => 'required|email|max:75'
                 );
        
        
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
          
            $data = array(
            'name' => $inputs['name'],
            'email' => $inputs['email'],           
            'phone' => $inputs['phone'],
            'user_message' => $inputs['message'],
             );

            $subject=$inputs['subject'];

            $contact_email=$inputs['contact_email'];


            \Mail::send('emails.inquiry', $data, function ($message) use ($subject,$contact_email){

                $message->from(getcong('site_email'), getcong('site_name'));

                $message->to($contact_email)->subject($subject);

            });
        

            \Session::flash('flash_message', 'Thank You. Your Message has been Submitted.');

            return \Redirect::back();

         
    }    

}
