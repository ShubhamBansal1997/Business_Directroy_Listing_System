<div class="slider-bg">
  <div id="slider" class="owl-carousel owl-theme slider">
    <div class="item"><img src="{{ URL::asset('upload/'.getcong('home_slide_image1'))}}" alt="slide images"></div>
    <div class="item"><img src="{{ URL::asset('upload/'.getcong('home_slide_image2'))}}" alt="slide images"></div>
    <div class="item"><img src="{{ URL::asset('upload/'.getcong('home_slide_image3'))}}" alt="slide images"></div>
  </div>
  <div class="find-section">
    <div class="container">
      <div class="row">
        <div class="col-md-offset-1 col-md-10 finder-block">
          <div class="finder-caption">
            <h1>{{getcong('home_slide_title')}}</h1>
            <p>{!!getcong('home_slide_text')!!}</p>
          </div>
          <div class="finderform">
            {!! Form::open(array('url' => 'listings/search','class'=>'','id'=>'search','role'=>'form')) !!}
              <div class="col-md-5 col-sm-5 no-padding"> <i class="fa fa-search local-search-ic"></i>
                <input type="text" class="form-control" name="search_keyword" id="input-search-term" title="Search for..." placeholder="Search anything here" value="" autocomplete="off">
              </div>
              <div class="form-group col-md-5 col-sm-5 no-padding"> <i class="fa fa-map-marker local-search-ic ic-map-location"></i>                        
          <div class="">
          <select id="location" name="location" class="form-control">
            <option value="">Select Location</option>
            @foreach(\App\Location::orderBy('location_name')->get() as $location) 
            <option value="{{$location->id}}">{{$location->location_name}}</option> 
            @endforeach
             
          </select>
          </div>
              </div>
              <button type="submit" class="btn tp-btn-default tp-btn-lg">Search</button>
            {!! Form::close() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>