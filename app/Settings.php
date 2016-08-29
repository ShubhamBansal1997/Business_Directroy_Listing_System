<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = ['site_name','currency_symbol', 'site_email', 'site_logo', 'site_favicon','site_description','site_header_code','site_footer_code','site_copyright','addthis_share_code','disqus_comment_code','facebook_comment_code','home_slide_image1','home_slide_image2','home_slide_image3','home_slide_title','home_slide_text','page_bg_image','about_title','about_description','contact_title','contact_address','contact_email','contact_number','contact_lat','contact_long','terms_of_title','terms_of_description','privacy_policy_title','privacy_policy_description','facebook_url','twitter_url','gplus_url','linkedin_url'];

 
	
	 public $timestamps = false;
    
}
