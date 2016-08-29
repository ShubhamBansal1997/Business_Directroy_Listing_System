@extends("app")

@section('head_title', 'Forgot Password | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Forgot Password</h1>
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
          <li class="active">Forgot Password</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12 tp-title-center">
        <h1>Forgot Password</h1>
      </div>
    </div>
    <div class="col-md-offset-3 col-md-6 well-box">
      <div class="tab-content ">
        <div role="tabpanel" class="tab-pane active vendor-login" id="home">
          {!! Form::open(array('url' => 'password/email','class'=>'','id'=>'password','role'=>'form')) !!} 

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
              <label class="control-label" for="email">Email<span class="required">*</span></label>
              <input id="email" name="email" type="text" placeholder="Enter mail" class="form-control input-md">
            </div>
             
            <div class="form-group">
              <button id="submit" name="submit" class="btn tp-btn-primary tp-btn-lg">Reset Password</button>
              <a href="{{ URL::to('login') }}" class="pull-right"> <small>Login ?</small></a> </div>
          {!! Form::close() !!} 
        </div>
      </div>
       
    </div>
  </div>
</div>
 

@endsection
