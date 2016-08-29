@extends("app")

@section('head_title', isset($listing->id) ? 'Edit Listing ' : 'Submit Listing'.' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
 
       <script src="{{ URL::asset('site_assets/js/jquery.min.js') }}"></script> 
       
       
       <link rel="stylesheet" href="{{ URL::asset('site_assets/summernote/summernote.css') }}">
        
       <script src="{{ URL::asset('site_assets/summernote/summernote.js') }}"></script>

        <script>
        $(document).ready(function() {
            $('#summernote').summernote({
            height: 250,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                  // set focus to editable area after initializing summernote
          });
        });
      </script>  

 <script type="text/javascript">
        $(document).ready(function(e) {
            
           $("#category").change(function(){
               var cat=$("#category").val();
            $.ajax({
            type: "GET",
             url: "{{ URL::to('ajax_subcategories') }}/"+cat,
             //data: "cat=" + cat,
             success: function(result){

                 $("#sub_category").html(result);
              }
            });
            
               });
        });
</script> 

<script type="text/javascript">
var abc = 0;
//function increment() {
    
//};
$(document).ready(function() {
    $('#add_more').click(function() {//When Add More Files button Clicked these function Willbe Called (new file field is added dynamically)
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'gallery_file[]', type: 'file', id: 'file'}),        
                $("")
                ));
    });

$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                //increment();
                abc += 1;
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: '{{ URL::asset('site_assets/images/x.png') }}', alt: 'delete'}).click(function() {
                //$(this).parent().parent().remove();
                $(this).parent().remove();
                }));
            }
        });
        
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});
</script> 

<link rel="stylesheet" type="text/css" href="{{ URL::asset('site_assets/tags/jquery.tagsinput.css') }}" />
 
<script type="text/javascript" src="{{ URL::asset('site_assets/tags/jquery.tagsinput.js') }}"></script>
<script type="text/javascript">

    function onAddTag(tag) {
      alert("Added a amenities: " + tag);
    }
    function onRemoveTag(tag) {
      alert("Removed a amenities: " + tag);
    }

    function onChangeTag(input,tag) {
      alert("Changed a amenities: " + tag);
    }

    $(function() {

      $('#tags_1').tagsInput({width:'auto'});
      
// Uncomment this line to see the callback functions in action
//      $('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

// Uncomment this line to see an input with no interface for adding new tags.
//      $('input.tags').tagsInput({interactive:false});
    });

  </script>

 <div class="tp-page-head" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image'))}}) no-repeat">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>{{ isset($listing->id) ? 'Edit Listing ' : 'Submit Listing' }}</h1>
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
          <li class="active">{{ isset($listing->id) ? 'Edit Listing ' : 'Submit Listing' }}</li>
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
        
        {!! Form::open(array('url' => array('submit_listing'),'class'=>'','name'=>'listing_form','id'=>'listing_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="id" value="{{ isset($listing->id) ? $listing->id : null }}">
        <div class="row">
          <div class="col-md-12" id="aboutus">
            <h1>{{ isset($listing->id) ? 'Edit Listing ' : 'Submit Listing' }}</h1>

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
           @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                    </div>
          @endif

            <div class="well-box">
              <h3 class="page-title">Description</h3>
                  
                <div class="form-group col-md-12">
                  <label for="first" class="control-label">Title :-</label>
                  <input type="text" class="form-control input-md" placeholder="Title" name="title" id="title" value="{{ isset($listing->title) ? $listing->title : null }}" required>
                </div>
                <div class="form-group col-sm-12">
                  <textarea rows="7" placeholder="description" name="description" id="summernote" class="js-summernote form-control" required>{{ isset($listing->description) ? $listing->description : null }}</textarea>
                   
                </div>
                <div class="clearfix"></div>
              
            </div>
            <div class="well-box">
              <h3 class="page-title">Attributes</h3>
              
                <div class="form-group col-md-6">
                  <label for="Category" class="control-label">Category :-</label>
                  <div class="">

                    <select class="form-control" id="category" name="category" required>
                      <option value="" >Select Category</option>
                         @foreach($categories as $i => $category) 
                            @if(isset($listing->cat_id) && $listing->cat_id==$category->id)  
                              <option value="{{$category->id}}" selected >{{$category->category_name}}</option>
                               
                            @else
                            <option value="{{$category->id}}">{{$category->category_name}}</option> 
                            @endif                        
                          @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="Category" class="control-label">Sub Category :-</label>
                  <div class="">
                    <select id="sub_category" name="sub_category" class="form-control" required>
                            <option value="">Select Sub Category</option>
                            @if(isset($listing->sub_cat_id))
                            @foreach($subcategories as $i => $subcategory)    
                                @if($listing->sub_cat_id==$subcategory->id)  
                                    <option value="{{$subcategory->id}}" selected >{{$subcategory->sub_category_name}}</option>
                                     
                                @else
                                 <option value="{{$subcategory->id}}" >{{$subcategory->sub_category_name}}</option>
                                @endif                          
                            @endforeach
                            @endif
                        </select>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="Category" class="control-label">Location :-</label>
                  <div class="">
                    <select class="form-control" name="location" id="location">
                      <option value="" >Select Location</option>
                         @foreach($locations as $i => $location) 
                            @if(isset($listing->location__id) && $listing->location__id==$location->id)  
                              <option value="{{$location->id}}" selected >{{$location->location_name}}</option>
                               
                            @else
                            <option value="{{$location->id}}">{{$location->location_name}}</option> 
                            @endif                        
                          @endforeach
                    </select>
                  </div>
                </div>                 
                <div class="form-group col-md-12">
                  <label for="first" class="control-label">Address :-</label>
                  <textarea rows="7" placeholder="Address" name="address"  class="form-control">{{ isset($listing->address) ? $listing->address : null }}</textarea>
                  <div class="textarea-resize"></div>

                </div>
                
                <div class="form-group col-md-6">
                  <label for="first" class="control-label">Map Latitude :-</label>
                  <input type="text" class="form-control input-md" placeholder="Latitude" name="latitude" id="latitude" value="{{ isset($listing->map_lat) ? $listing->map_lat : null }}">
                </div>
                <div class="form-group col-md-6">
                  <label for="first" class="control-label">Map Lontgitude :-</label>
                  <input type="text" class="form-control input-md" placeholder="Lontgitude" name="lontgitude" id="lontgitude" value="{{ isset($listing->map_long) ? $listing->map_long : null }}">
                </div>

                <div class="form-group col-md-6">
                  <label for="first" class="control-label">Featured Image :-</label>
                    <input type="file" name="featured_image" id="input-file" class="form-control input-md">

                </div>
                <div class="form-group col-md-6">
                    @if(isset($listing->featured_image))
                                 
                  <img src="{{ URL::asset('upload/listings/'.$listing->featured_image.'-s.jpg') }}" width="80" alt="featured">
                @endif

                </div>
                 
                <div class="clearfix"></div>
              
            </div>
            <div class="well-box well-box-file">
              <h3 class="page-title">Amenities</h3>
              <div class="detail-content">
                 <input id="tags_1" type="text" name="amenities" class="form-control" value="{{ isset($listing->amenities) ? $listing->amenities : 'Parking,WiFi,Terrace' }}" />
                
              </div>
            </div>
          <div class="well-box">
              <h3 class="page-title">Working Hours</h3>                                                             
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Monday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_mon" id="Monday" value="{{ isset($listing->working_hours_mon) ? $listing->working_hours_mon : null }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Tuesday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_tue" id="Tuesday" value="{{ isset($listing->working_hours_tue) ? $listing->working_hours_tue : null }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Wednesday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_wed" id="Wednesday" value="{{ isset($listing->working_hours_wed) ? $listing->working_hours_wed : null }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Thursday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_thurs" id="Thursday" value="{{ isset($listing->working_hours_thurs) ? $listing->working_hours_thurs : null }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Friday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_fri" id="Friday" value="{{ isset($listing->working_hours_fri) ? $listing->working_hours_fri : null }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Saturday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_sat" id="Saturday" value="{{ isset($listing->working_hours_sat) ? $listing->working_hours_sat : null }}">
                </div>
                <div class="form-group col-md-4">
                  <label for="first" class="control-label">Sunday :-</label>
                  <input type="text" class="form-control input-md" name="working_hours_sun" id="Sunday" value="{{ isset($listing->working_hours_sun) ? $listing->working_hours_sun : null }}">
                </div>        
                <div class="clearfix"></div>              
            </div>
            <div class="well-box">
              <h3 class="page-title">Video</h3>

                <div class="form-group col-md-12">                   
                  <textarea rows="7" placeholder="Video Embed Code" name="video"  class="form-control">{{ isset($listing->video) ? $listing->video : null }}</textarea>
                  <div class="textarea-resize"></div>

                </div>

              <div class="clearfix"></div>              
            </div>
            <div class="well-box file-browes">
              <h3 class="page-title">Gallery</h3>
               <div class="col-md-12"> 
                      <link rel="stylesheet" href="{{ URL::asset('site_assets/css/gallery_style.css') }}">

                       <div class="media">
                            <div class="med_list media-left">
                                @if(isset($listing->id))
                                    @foreach($listing_gallery_images as $i => $gallery_img)

                                        <div id="abcd_1" class="abcd">
                                         <img src="{{ URL::asset('upload/gallery/'.$gallery_img->image_name) }}" width="100" alt="image">
                                         <a href="{{ url('listing/galleryimage_delete/'.$gallery_img->id) }}"><img id="img" src="{{ URL::asset('site_assets/images/x.png') }}" alt="delete"></a>
                                        </div>
                                    @endforeach
                                @endif   

                                                             
                            </div>
                             
                        </div>
                         <div id="formdiv"> 
                             <div id="filediv"></div>
                             <div style="margin-top:5px;">
                            <input name="gallery_file[]" type="file" id="file"/>
                            <input type="button" id="add_more" class="upload" value="Add More Images"/>
                            </div>
                
                        </div> 

               </div> 
              <div class="clearfix"></div>
               
            </div>
            
            <div class="center mb20">
              <button class="btn btn-primary btn-xl" type="submit">Submit Listing</button>
            </div>
            {!! Form::close() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection