@extends("app")

@section('head_title', getcong('contact_title').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
 <div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat"><!-- page header -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>{{getcong('contact_title')}}</h1>
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
          <li class="active">{{getcong('contact_title')}}</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="well-box">
          {!! Form::open(array('url' => 'contact_send','class'=>'','id'=>'contact_form','role'=>'form')) !!}

            <div class="message">
                         
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    
                        <ul style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                                    
            </div>
            @if(Session::has('flash_message'))

              <div class="alert alert-success fade in">
                  
                 {{ Session::get('flash_message') }}
               </div>

                 
            @endif   

            <div class="form-group">
              <label class="control-label" for="first">Name <span class="required">*</span></label>
              <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" >
            </div>
            <div class="form-group">
              <label class="control-label" for="email">Email <span class="required">*</span></label>
              <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" >
            </div>            
            <div class="form-group">
              <label class=" control-label" for="subject">Subject <span class="required">*</span></label>
              <input id="subject" name="subject" type="text" placeholder="Subject" class="form-control input-md" >
            </div>
            <div class="form-group">
              <label class="  control-label" for="message">Message</label>
              <textarea class="form-control" rows="6" id="message" name="message" placeholder="Message"></textarea>
              <div class="textarea-resize"></div>
            </div>
            <div class="form-group">
              <button id="submit" name="submit" class="btn tp-btn-default tp-btn-lg">Send Message</button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
      <div class="col-md-6 contact-info">
        <div class="well-box">
          <ul class="listnone">
            <li class="address">
              <h2><i class="fa fa-map-marker"></i>Address</h2>
              <p>{!!getcong('contact_address')!!}</p>
            </li>
            <li class="email">
              <h2><i class="fa fa-envelope"></i>Email</h2>
              <p>{{getcong('contact_email')}}</p>
            </li>
            <li class="call">
              <h2><i class="fa fa-phone"></i>Contact</h2>
              <p>{{getcong('contact_number')}}</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="map" id="googleMap"></div>
      </div>
    </div>
  </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js"></script> 
<script>
var myCenter=new google.maps.LatLng({{getcong('contact_lat')}},{{getcong('contact_long')}});

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:9,
  scrollwheel: false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({
        position: myCenter, 
        map: map,
        title:"Contact"
});

marker.setMap(map);
var infowindow = new google.maps.InfoWindow({
  content:"Contact"
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>   
 
@endsection
