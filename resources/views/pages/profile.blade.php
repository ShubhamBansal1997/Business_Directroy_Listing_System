@extends("app")

@section('head_title', 'Profile | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

 <div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Edit Profile</h1>
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
          <li class="active">Edit Profile</li>
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
            <h1>Edit Profile</h1>
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


              {!! Form::open(array('url' => 'profile','class'=>'','id'=>'myProfile','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <div class="form-group col-md-6">
                  <label for="first_name" class="control-label">First Name <span class="required">*</span></label>
                  <input type="text" required class="form-control input-md" placeholder="First Name" name="first_name" id="first_name" value="{{$user->first_name}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="last_name" class="control-label">Last Name <span class="required">*</span></label>
                  <input type="text" required class="form-control input-md" placeholder="last_name" name="last_name" id="last_name" value="{{$user->last_name}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="email" class="control-label">Email <span class="required">*</span></label>
                  <input type="text" class="form-control input-md" placeholder="Email" name="email" id="email" value="{{$user->email}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="mobile" class="control-label">Phone </label>
                  <input type="text" class="form-control input-md" placeholder="+01 123 456 78" name="mobile" id="mobile" value="{{$user->mobile}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="contact_email" class="control-label">Contact Email</label>
                  <input type="text" class="form-control input-md" placeholder="info@example.com" name="contact_email" id="contact_email" value="{{$user->contact_email}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="website" class="control-label">Website</label>
                  <input type="text" class="form-control input-md" placeholder="http://example.com" name="website" id="website" value="{{$user->website}}">
                </div>
                <div class="form-group col-sm-12">
                  <label for="email" class="control-label">Address :-</label>
                  <textarea rows="7" class="form-control" name="address">{{$user->address}}</textarea>
                  <div class="textarea-resize"></div>
                </div>
                <div class="clearfix"></div>
               
            </div>
            <div class="well-box">
              <h3 class="page-title">Social Links</h3>
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Facebook Url:-</label>
                  <div class="col-sm-9">
                    <input type="text" name="facebook_url" value="{{$user->facebook_url}}" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Twitter Url:-</label>
                  <div class="col-sm-9">
                    <input type="text" name="twitter_url" value="{{$user->twitter_url}}" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Linkedin Url:-</label>
                  <div class="col-sm-9">
                    <input type="text" name="linkedin_url" value="{{$user->linkedin_url}}" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Dribbble Url:-</label>
                  <div class="col-sm-9">
                    <input type="text" name="dribbble_url" value="{{$user->dribbble_url}}" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Instagram Url:-</label>
                  <div class="col-sm-9">
                    <input type="text" name="instagram_url" value="{{$user->instagram_url}}" class="form-control">
                  </div>
                </div>
              </div>
            </div>
             
            <div class="well-box">
              <h3 class="page-title">User Avatar</h3>              
                <div class="col-md-12 user-picture"> 
                        <input type="file" name="user_icon" id="input-file">
                </div>
              <div class="clearfix"></div>
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