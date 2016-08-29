<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Location;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 


class LocationController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function locations()    { 
        
              
        $locations = Location::orderBy('location_name')->get();
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
 
         
        return view('admin.pages.locations',compact('locations'));
    }
    
    public function addeditLocation()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        

        return view('admin.pages.addeditlocation');
    }
    
    public function addnew(Request $request)
    { 
        
        $data =  \Input::except(array('_token')) ;
        
        $rule=array(
                'location_name' => 'required'                
                 );
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
        $inputs = $request->all();
        
        if(!empty($inputs['id'])){
           
            $location = Location::findOrFail($inputs['id']);

        }else{

            $location = new Location;

        }
        
        
        if($inputs['location_slug']=="")
        {
            $location_slug = str_slug($inputs['location_name'], "-");
        }
        else
        {
            $location_slug =str_slug($inputs['location_slug'], "-"); 
        }
        
        $location->location_name = $inputs['location_name']; 
        $location->location_slug = $location_slug;
         
        
         
        $location->save();
        
        if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }            
        
         
    }     
   
    
    public function editLocation($location_id)    
    {     
    
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        	     
          $location = Location::findOrFail($location_id);
          
           

          return view('admin.pages.addeditlocation',compact('location'));
        
    }	 
    
    public function delete($location_id)
    {
    	if(Auth::User()->usertype=="Admin" or Auth::User()->usertype=="Owner")
        {
        	
        $location = Location::findOrFail($location_id);
        $location->delete();

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
