@extends("app")

@section('head_title', 'Dashboard | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

 <div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tp-breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      
      @include("_particles.user_sidebar")

     <div class="col-md-9 col-sm-9 content-right">
        <div class="row">
          <div class="col-md-12" id="aboutus">
            <h1>Dashboard</h1>                          
        <div class="col-md-3 col-sm-6">
        <div class="statusbox">
          <h2>All Listings</h2>
          <div class="statusbox-content"> <strong>{{$listings}}</strong> </div>          
        </div>
        </div>
        <div class="col-md-3 col-sm-6">
        <div class="statusbox">
          <h2>Published</h2>
          <div class="statusbox-content"> <strong>{{$publish_listings}}</strong>   </div>          
        </div>
        </div>
        <div class="col-md-3 col-sm-6">
        <div class="statusbox">
        <h2>Pending</h2>
        <div class="statusbox-content"> <strong>{{$pending_listings}}</strong> </div>        
        </div>
      </div>
                                             
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection