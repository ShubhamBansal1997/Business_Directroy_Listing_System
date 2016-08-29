<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $fillable = ['location_name', 'location_slug'];


	public $timestamps = false;
   
}
