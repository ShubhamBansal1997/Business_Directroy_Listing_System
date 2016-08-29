@extends('app')

@section('head_title', 'Search Listings | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

<div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Search</h1>
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
          <li><a href="{{ URL::to('/') }}">Home</a></li>
          <li class="active">Search</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
  
  @include("_particles.sidebar")     

 <div class="col-md-9 col-sm-8">
        <div class="row">
          
          @foreach($listings as $listing) 
          <div class="col-md-4 vendor-box" style="min-height:410px;">
            <div class="vendor-image"> <a href="{{URL::to('listings/'.$listing->listing_slug.'/'.$listing->id)}}"><img src="{{ URL::asset('upload/listings/'.$listing->featured_image.'-s.jpg') }}" class="img-responsive"></a>
               
            </div>
            <div class="vendor-detail">
              <div class="caption">
                <h2><a href="{{URL::to('listings/'.$listing->listing_slug.'/'.$listing->id)}}" class="title">{{$listing->title}}</a></h2>
                <p class="location" style="min-height:42px;">{{str_limit($listing->address,50)}}</p>
                <div class="rating"> 
                  @for($x = 0; $x < 5; $x++)
                  
                    @if($x < $listing->review_avg)
                      <i class="fa fa-star"></i>
                    @else
                      <i class="fa fa-star-o"></i>
                    @endif
                   
                    @endfor
                    <span class="rating-count">({{\App\Reviews::getTotalReview($listing->id)}})</span> 
                </div>
              </div>
              
              <div class="clearfix"></div>
            </div>
          </div>
          @endforeach

         
            
        </div>
      </div>
    </div>
  </div>
</div>

 
@endsection