@extends("app")

@section('head_title', 'My Listing | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

 <div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>My Listing</h1>
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
          <li class="active">My Listing</li>
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
            <h1>My Listing</h1> 

            @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
          @endif

        <div class="well-box">
          
          <table class="table table-bordered mb0">
          <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach($listings as $i => $listing)
          <tr>
            <th scope="row">{{$i+1}}</th>
            <td>{{$listing->title}}</td>
            <td>
              @if($listing->status=='0')
                 <span class="label label-danger">Pending</span>
              @else
                  <span class="label label-success">Publish</span>
              @endif
            </td>
            <td>
              <a href="{{URL::to('submit_listing/'.$listing->id)}}" class="btn btn-info">Edit</a> 
              <a href="{{URL::to('delete_listing/'.$listing->id)}}" class="btn btn-danger">Delete</a>
              </td>
          </tr>
          @endforeach
      
          
           
                  
          </tbody>
        </table>
        
        <div class="span12 pagination-center">
          <div class="dataTables_paginate paging_bootstrap pagination">
           
            @include('_particles.pagination', ['paginator' => $listings])
           
          </div>
        </div>
        <div class="clearfix"></div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection