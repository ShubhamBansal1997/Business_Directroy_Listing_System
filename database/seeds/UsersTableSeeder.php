<?php

use App\Events\Inst;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        // Create admin account
        DB::table('users')->insert([
            'usertype' => 'Admin',
            'first_name' => 'John',
            'last_name' => 'Deo',            
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'image_icon' => 'upload/members/john-5d8c77eb422e0df92e3bc80d445f4661-b.jpg',
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
         
        
        DB::table('settings')->insert([            
            'site_name' => 'Directory Listings',            
            'site_email' => 'admin@admin.com',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.png',
            'site_description' => 'Viavi - Local Business Directory Listings Script',
            'site_copyright' => 'Copyright © 2016 Viavi - Local Business Directory Script. All Rights Reserved.',
            'home_slide_title' => 'LOCAL BUSINESS DIRECTORY',
            'home_slide_image1' => 'home_slide_image1.png',
            'home_slide_image2' => 'home_slide_image2.png',
            'home_slide_image3' => 'home_slide_image3.png',
            'page_bg_image' => 'page_bg_image.png',
            'about_title' => 'About Us',
            'contact_title' => 'Contact Us',
            'terms_of_title' => 'Terms and Condition',
            'privacy_policy_title' => 'Privacy Policy' 
        ]);
         
		DB::table('categories')->insert([
            'category_icon' => 'fa-globe',
            'category_name' => 'Advertising',
            'category_slug' => 'advertising',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-home',
            'category_name' => 'Home & Garden',
            'category_slug' => 'home-garden',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-shopping-cart',
            'category_name' => 'E-Commerce',
            'category_slug' => 'e-commerce',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-book',
            'category_name' => 'Education',
            'category_slug' => 'education',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-film',
            'category_name' => 'Entertainment',
            'category_slug' => 'entertainment',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-magnet',
            'category_name' => 'Industry',
            'category_slug' => 'industry',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-building-o',
            'category_name' => 'Real Estate',
            'category_slug' => 'real-estate',
            'status' => '1'
        ]);

        DB::table('categories')->insert([
            'category_icon' => 'fa-coffee',
            'category_name' => 'Restaurants',
            'category_slug' => 'restaurants',
            'status' => '1'
        ]); 
		
       // factory('App\User', 20)->create();
    }
}
