<div class="col-md-3 col-sm-3 side-nav" id="leftCol">
        <div class="user-photo">
        
          <img alt="User Photo" src="{{URL::to(Auth::user()->image_icon)}}">
          
        </div>
        <div class="hide-side">
          <ul class="listnone nav" id="sidebar">
            <li class="{{classActivePathSite('dashboard')}}"><a href="{{ URL::to('dashboard') }}"><i class="fa fa-tachometer"></i> Dashboard</a></li>            
            <li class="{{classActivePathSite('profile')}}"><a href="{{ URL::to('profile') }}"><i class="fa fa-user"></i> Edit Profile</a></li>
            <li class="{{classActivePathSite('change_pass')}}"><a href="{{ URL::to('change_pass') }}"><i class="fa fa-key"></i> Change Password</a></li>
            
            <li class="{{classActivePathSite('mylisting')}}"><a href="{{ URL::to('mylisting') }}"><i class="fa fa-map-marker"></i> My Listing</a></li>

            <li class="{{classActivePathSite('submit_listing')}}"><a href="{{ URL::to('submit_listing') }}"><i class="fa fa-plus"></i> Submit Listing</a></li>
            
            <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </div>
      </div>