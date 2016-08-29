@extends("app")

@section('head_title', 'Register | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Register</h1>
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
          <li class="active">Register</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12 tp-title-center">
        <h1>Create an account</h1>
      </div>
    </div>
    <div class="col-md-offset-3 col-md-6 well-box">
      <div class="tab-content ">
        <div role="tabpanel" class="tab-pane active vendor-login" id="home">
          {!! Form::open(array('url' => 'register','class'=>'','id'=>'register','role'=>'form')) !!} 

            <div class="message">
                         
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
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
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
             {{ Session::get('flash_message') }}
           </div>

             
        @endif

            <div class="form-group">
              <label class="control-label" for="first_name">First Name<span class="required">*</span></label>
              <input id="first_name" name="first_name" type="text" value="" class="form-control input-md">
            </div>
            <div class="form-group">
              <label class="control-label" for="last_name">Last Name<span class="required">*</span></label>
              <input id="last_name" name="last_name" type="text" value="" class="form-control input-md">
            </div>
            <div class="form-group">
              <label class="control-label" for="email">Email<span class="required">*</span></label>
              <input id="email" name="email" type="email" value="" class="form-control input-md">
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Password<span class="required">*</span></label>
              <input id="password" name="password" type="text" value="" class="form-control input-md">
            </div>
            <div class="form-group">
              <label class="control-label" for="password_confirmation">Confirm Password<span class="required">*</span></label>
              <input id="password_confirmation" name="password_confirmation" type="text" value="" class="form-control input-md">
            </div>
            <div class="form-group">
                <p>I have read the <a href="{{ URL::to('termsandconditions') }}" target="_blank">{{getcong('terms_of_title')}}</a> and agree to them.</p><br/>
              <button id="submit" name="submit" class="btn tp-btn-primary tp-btn-lg">Create</button>
                </div>
          {!! Form::close() !!} 
        </div>
      </div>
      <h3 class="tp-title-center">Or Use Social Login</h3>
      <div class="well-box mr-0 social-login"> 
        
        <a href="{{ URL::to('social/login/facebook') }}" class="btn facebook-btn"><i class="fa fa-facebook-square"></i>Facebook</a> 
        
        <a href="{{ URL::to('social/login/google') }}" class="btn google-btn"><i class="fa fa-google-plus-square"></i>Google+</a> 
      </div>
    </div>
  </div>
</div>
 

@endsection
