<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Settings;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class SettingsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function settings()
    { 
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $settings = Settings::findOrFail('1');
        
        return view('admin.pages.settings',compact('settings'));
    }	 
    
    public function settingsUpdates(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'site_name' => 'required',
		        'site_email' => 'required'
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }
	    

	    $inputs = $request->all();
		
		$icon = $request->file('site_logo');
		
		$icon_favicon = $request->file('site_favicon');
		 
		//Logo
		 
        if($icon){
            
           // $icon->move(public_path().'/upload/', 'logo.png');
            
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'logo.png';
			
            $img = Image::make($icon);

            $img->save($tmpFilePath.$hardPath); 
             
            $settings->site_logo = 'logo.png';
             
        }       
        
        //Favicon
        if($icon_favicon){
        	
        	//$icon_favicon->move(public_path().'/upload/', 'favicon.png');
             
            //$settings->site_favicon = 'favicon.png';
            
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'favicon.png';
			
            $img = Image::make($icon_favicon);

            $img->fit(16, 16)->save($tmpFilePath.$hardPath); 
             
            $settings->site_favicon = 'favicon.png';
            
             
        }
       
		 
		$settings->site_name = $inputs['site_name']; 
		
		$settings->site_email = $inputs['site_email'];
		$settings->site_description = $inputs['site_description'];

		$settings->google_map_api = $inputs['google_map_api'];

		$settings->facebook_url = $inputs['facebook_url'];
		$settings->twitter_url = $inputs['twitter_url'];
		$settings->gplus_url = $inputs['gplus_url'];
		$settings->linkedin_url = $inputs['linkedin_url'];
		

		$settings->site_copyright = $inputs['site_copyright'];
		
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function homepage_settings(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		
		$home_slide_image1 = $request->file('home_slide_image1');
		
		//Home slide 1
        if($home_slide_image1){
        	
        	 
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'home_slide_image1.png';
			
            $img = Image::make($home_slide_image1);

            $img->save($tmpFilePath.$hardPath); 
             
            $settings->home_slide_image1 = 'home_slide_image1.png';
            
             
        }

        $home_slide_image2 = $request->file('home_slide_image2');
		
		//Home slide 2
        if($home_slide_image2){
        	
        	 
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'home_slide_image2.png';
			
            $img = Image::make($home_slide_image2);

            $img->save($tmpFilePath.$hardPath); 
             
            $settings->home_slide_image2 = 'home_slide_image2.png';
            
             
        }

        $home_slide_image3 = $request->file('home_slide_image3');
		
		//Home slide 2
        if($home_slide_image3){
        	
        	 
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'home_slide_image3.png';
			
            $img = Image::make($home_slide_image3);

            $img->save($tmpFilePath.$hardPath); 
             
            $settings->home_slide_image3 = 'home_slide_image3.png';
            
             
        }

        $page_bg_image = $request->file('page_bg_image');
		
		//Home page bg image
        if($page_bg_image){
        	
        	 
            $tmpFilePath = 'upload/';			
			 
			$hardPath = 'page_bg_image.png';
			
            $img = Image::make($page_bg_image);

            $img->save($tmpFilePath.$hardPath); 
             
            $settings->page_bg_image = 'page_bg_image.png';
            
             
        }
		 
		$settings->home_slide_title = $inputs['home_slide_title'];; 
		$settings->home_slide_text = $inputs['home_slide_text'];; 
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function aboutus_settings(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->about_title = $inputs['about_title']; 
		$settings->about_description = $inputs['about_description'];
		 
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function contactus_settings(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->contact_title = $inputs['contact_title']; 
		$settings->contact_address = $inputs['contact_address'];
		$settings->contact_email = $inputs['contact_email'];
		$settings->contact_number = $inputs['contact_number'];
		$settings->contact_lat = $inputs['contact_lat'];
		$settings->contact_long = $inputs['contact_long'];
		 
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function terms_of_service(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->terms_of_title = $inputs['terms_of_title']; 
		$settings->terms_of_description = $inputs['terms_of_description'];
		 
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function privacy_policy(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->privacy_policy_title = $inputs['privacy_policy_title']; 
		$settings->privacy_policy_description = $inputs['privacy_policy_description'];
		 
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function addthisdisqus(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->addthis_share_code = $inputs['addthis_share_code']; 
		$settings->disqus_comment_code = $inputs['disqus_comment_code'];
		$settings->facebook_comment_code = $inputs['facebook_comment_code'];
		 		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function headfootupdate(Request $request)
    {  
    		 
    	$settings = Settings::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	    
	     
	    $inputs = $request->all();
		
		 
		$settings->site_header_code = $inputs['site_header_code']; 
		$settings->site_footer_code = $inputs['site_footer_code'];
		 
		  
		 
	    $settings->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    } 
    	
}
