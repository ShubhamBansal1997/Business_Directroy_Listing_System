@extends("app")

@section('head_title', 'Change Password | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 

<div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Change Password</h1>
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
          <li class="active">Change Password</li>
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
            <h1>Change Password</h1>
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
                      <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>             
                          {{ Session::get('flash_message') }}
                      </div>
                  @endif
            <div class="well-box">
              <h3 class="page-title">Account Information</h3>


              {!! Form::open(array('url' => 'change_pass','class'=>'','id'=>'myProfile','role'=>'form')) !!} 
                <div class="form-group col-md-6">
                  <label for="first_name" class="control-label">Password <span class="required">*</span></label>
                  <input type="password" class="form-control input-md" placeholder="Password" name="password" id="password" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for="last_name" class="control-label">Confirm Nassword <span class="required">*</span></label>
                  <input type="password" class="form-control input-md" placeholder="Confirm password" name="password_confirmation" id="password_confirmation" value="">
                </div>
                
            
            <div class="center mb20">
              <button class="btn btn-primary btn-xl" type="submit">Save Settings</button>
            </div>

            {!! Form::close() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
