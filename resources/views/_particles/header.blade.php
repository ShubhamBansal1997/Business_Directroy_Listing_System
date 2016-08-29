<div class="collapse" id="searcharea">
  {!! Form::open(array('url' => 'listings/search','class'=>'','id'=>'search','role'=>'form')) !!}
  <div class="input-group">
    <input type="hidden" name="location"> 
    <input type="text" class="form-control" name="search_keyword" laceholder="Search anything here" value="" autocomplete="off">
    <span class="input-group-btn">
    <button class="btn tp-btn-primary" type="submit">Search</button>
    </span> </div>
  {!! Form::close() !!}   
</div>
<div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-lg-6 top-message">
        
      </div>
      <div class="col-md-6 col-sm-6 col-lg-6 top-links">
        <ul class="listnone">
          @if(!Auth::check())
          <li><a href="{{ URL::to('login') }}">Log in</a></li>
          <li><a href="{{ URL::to('register') }}" style="padding-right:20px;">Register</a></li>
          @endif
          <li><a role="button" data-toggle="collapse" href="#searcharea" aria-expanded="false" aria-controls="searcharea"><i class="fa fa-search"></i></a></li>
          <li><a href="{{getcong('facebook_url')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a href="{{getcong('twitter_url')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
          <li><a href="{{getcong('gplus_url')}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="{{getcong('linkedin_url')}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="tp-nav" id="headersticky">
  <div class="container">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="{{ URL::to('/') }}">
          @if(getcong('site_logo'))
          <img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="logo" class="img-responsive">
          @else
            <img src="{{ URL::asset('site_assets/images/logo.png') }}" alt="logo" class="img-responsive">
          @endif

          
        </a> </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="{{ URL::to('/') }}">Home</a></li>
          <li class="active"><a href="{{ URL::to('listings') }}">Listings</a></li>
           
          
          @if(Auth::check())
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="fa fa-angle-down"></span></a>
            <ul class="dropdown-menu">               
                @if(Auth::User()->usertype =="Admin")
                <li><a href="{{ URL::to('admin/dashboard') }}">Admin</a></li>
                @endif
                <li><a href="{{ URL::to('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL::to('profile') }}">Edit Profile</a></li>
                <li><a href="{{ URL::to('change_pass') }}">Change Password</a></li>
                <li><a href="{{ URL::to('mylisting') }}">My Listing</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
            </ul>
          </li>
          @endif

          <li> <a href="{{ URL::to('about') }}">{{getcong('about_title')}}</a></li>
          <li><a href="{{ URL::to('contact') }}">{{getcong('contact_title')}}</a></li>
        </ul>
      </div>
    </nav>
  </div>
</div>