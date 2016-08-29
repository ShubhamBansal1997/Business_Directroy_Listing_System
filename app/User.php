<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login_with','usertype','first_name','last_name','gender', 'email', 'password','image_icon','mobile','contact_email','website','address','facebook_url','twitter_url','linkedin_url','dribbble_url','instagram_url','facebook_id','google_id','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUserInfo($id) 
    { 
        return User::find($id);
    }

    public static function getUserFullname($id) 
    { 
        $userinfo=User::find($id);

        return $userinfo->first_name.' '.$userinfo->last_name;
    }
}
