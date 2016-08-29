<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Categories;

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
