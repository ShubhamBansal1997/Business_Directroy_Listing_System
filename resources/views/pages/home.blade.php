@extends('app')

@section('content')

@include("_particles.slider_search") 

<div class="spacer feature-section classifieds-content">
  <div class="container">
    <div class="heading-section clearfix">
      <h1>Classifieds Categories</h1>
       
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="classifieds-category">
          @foreach(\App\Categories::orderBy('category_name')->get() as $cat)
          <li><a href="{{URL::to($cat->category_slug.'/'.$cat->id)}}"><i class="fa {{$cat->category_icon}}"></i>{{$cat->category_name}} <span>({{ \App\Categories::countCategoryListings($cat->id) }})</span></a>
            <ul class="sub-category">
              @foreach(\App\SubCategories::where('cat_id',$cat->id)->orderBy('sub_category_name')->get() as $subcat)
              <li><a href="{{URL::to($cat->category_slug.'/'.$subcat->sub_category_slug.'/'.$subcat->id)}}">{{$subcat->sub_category_name}} <span>({{ \App\SubCategories::countSubCategoryListings($subcat->id) }})</span></a></li>
              @endforeach
               
            </ul>
          </li>
          @endforeach
           
        </ul>
      </div>
       
    </div>
  </div>
</div>
<div id="featured-list" class="featured-listing">
  <div class="container">
    <div class="row clearfix">
      <h2><strong>Freatured</strong> Listing</h2>
      @foreach(\App\Listings::where(array('featured_listing'=>'1','status'=>'1'))->orderBy('id')->get() as $featured_listing)
      <div class="col-md-3 col-sm-4 col-xs-6 hi-icon-effect-8">
        <div class="single-product">
          <figure> <img alt="" src="{{ URL::asset('upload/listings/'.$featured_listing->featured_image.'-s.jpg') }}">
            <div class="rating">
              <ul class="list-inline">
                @for($x = 0; $x < 5; $x++)
                  
                @if($x < $featured_listing->review_avg)
                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                @else
                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                @endif
               
                @endfor
                
              </ul>
              <p>Featured</p>
            </div>
            <figcaption>
              <div class="read-more"> <a href="{{URL::to('listings/'.$featured_listing->listing_slug.'/'.$featured_listing->id)}}"><i class="fa fa-angle-right"></i> Read More</a> </div>
            </figcaption>
          </figure>
          <h4><a href="{{URL::to('listings/'.$featured_listing->listing_slug.'/'.$featured_listing->id)}}">{{$featured_listing->title}}</a></h4>
           <p class="location" style="min-height: 50px;">{{str_limit($featured_listing->address,50)}}</p>
        </div>
      </div>
      @endforeach
       
    </div>
  </div>
</div>

 
@endsection