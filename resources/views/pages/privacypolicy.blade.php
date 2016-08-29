@extends("app")

@section('head_title', getcong('privacy_policy_title').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>{{getcong('privacy_policy_title')}}</h1>
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
          <li class="active">{{getcong('privacy_policy_title')}}</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12 content-right">
        <div class="row">
          <div class="col-md-12 aboutus" id="aboutus">

            {!!getcong('privacy_policy_description')!!}
            
          </div>
           
        </div>
         
      </div>
    </div>
  </div>
</div>
 

@endsection
