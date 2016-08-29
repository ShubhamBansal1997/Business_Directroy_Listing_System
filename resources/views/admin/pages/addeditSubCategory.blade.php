@extends("admin.admin_app")

@section("content")

  <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                
                               {{ isset($subcat->id) ? 'Edit Sub Category' : 'Add Sub Category' }}
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li><a href="{{ URL::to('admin/subcategories') }}">Sub Categories</a></li>
                                <li><a class="link-effect" href="">{{ isset($subcat->id) ? 'Edit Sub Category ' : 'Add Sub Category' }}</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->
                <!-- Page Content -->
                <div class="content content-boxed">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="block">
                               <div class="block-content block-content-narrow"> 
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <ul>
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



                                {!! Form::open(array('url' => array('admin/subcategories/addsubcategory'),'class'=>'form-horizontal padding-15','name'=>'category_form','id'=>'category_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
                                    <input type="hidden" name="id" value="{{ isset($subcat->id) ? $subcat->id : null }}">
                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Category</label>
                                        
                                        <div class="col-sm-9">
                                            <select id="basic" name="category" class="js-select2 form-control">
                                                <option value="">Select Category</option>
                                                
                                                @foreach($categories as $i => $category)    
                                                    @if(isset($subcat->cat_id) && $subcat->cat_id==$category->id)  
                                                        <option value="{{$category->id}}" selected >{{$category->category_name}}</option>
                                                         
                                                    @else
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option> 
                                                    @endif                          
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Sub Category Name</label>
                                          <div class="col-sm-9">
                                            <input type="text" name="sub_category_name" value="{{ isset($subcat->sub_category_name) ? $subcat->sub_category_name : null }}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Sub Category Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sub_category_slug" value="{{ isset($subcat->sub_category_slug) ? $subcat->sub_category_slug : null }}" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-sm-9 ">
                                            <button type="submit" class="btn btn-primary">{{ isset($subcat->id) ? 'Edit Sub Category' : 'Add Sub Category' }}</button>
                                             
                                        </div>
                                    </div>
                                    
                                    {!! Form::close() !!} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->            
@endsection