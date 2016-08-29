@extends("app")

@section('head_title', 'Page not found! | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

<div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>404</h1>
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
          <li class="active">404</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12 error-block">
        <h1>404</h1>
        <h2><i class="fa fa-warning"></i>oooopppss! page was not found, Sorry! it looks like that page has gone missing.</h2>
        <p>Please use navigation above to browse topics, or go back to <a href="{{ URL::to('/') }}">{{getcong('site_name')}}.</a> </p>
      </div>
    </div>
  </div>
</div>
 
@endsection
