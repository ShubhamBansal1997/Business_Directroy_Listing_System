@extends("admin.admin_app")

@section("content")
 
  <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Listings  
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
                                <li><a class="link-effect" href="">Listings</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header">                            
                            <a class="pull-right btn btn-primary push-5-r push-10" href="{{URL::to('submit_listing')}}" target="_blank"><i class="fa fa-plus"></i> Add Listing</a>
                          
                            <div class="clearfix"></div>

                          @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                                        {{ Session::get('flash_message') }}
                                    </div>
                          @endif
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped listings-dataTable-full">
                                <thead>
                                    <tr>

                                        <th class="text-center">User</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Sub Category</th>                                         
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Featured</th>
                                        <th class="text-center">Status</th>
                                           
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($listings as $i => $listing)
                                    <tr>
                                        <td class="text-center">{{ \App\User::getUserFullname($listing->user_id) }}</td>
                                        <td class="text-center">{{$listing->category_name}}</td>
                                        <td class="text-center">{{$listing->sub_category_name}}</td>
                                        <td class="text-center font-w600">{{$listing->title}}</td>
                                        <td class="text-center">
                                            @if($listing->featured_listing=='0')
                                            <a href="{{URL::to('admin/listings/featured_listing/'.$listing->id.'/1')}}" data-toggle="tooltip" title="Set Featured"><i class="si si-close text-danger"></i></a>
                                            @else
                                            <a href="{{URL::to('admin/listings/featured_listing/'.$listing->id.'/0')}}" data-toggle="tooltip" title="Unset Featured"><i class="si si-check text-success"></i></a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($listing->status=='0')
                                            <a href="{{URL::to('admin/listings/status_listing/'.$listing->id.'/1')}}" data-toggle="tooltip" title="Publish?"><span class="label label-danger">Pending</span></a>
                                            @else
                                            <a href="{{URL::to('admin/listings/status_listing/'.$listing->id.'/0')}}" data-toggle="tooltip" title="Pending?"><span class="label label-success">Publish</span></a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{URL::to('submit_listing/'.$listing->id)}}" class="btn btn-xs btn-default"  data-toggle="tooltip" title="Edit" target="_blank"><i class="fa fa-pencil"></i></a>

                                                 <a href="{{URL::to('admin/listings/delete_listing/'.$listing->id)}}" class="btn btn-xs btn-default"  data-toggle="tooltip" title="Remove" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="fa fa-times"></i></a>
                                            </div>
                                        
                                    </td>
                                        
                                    </tr>
                                   @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Dynamic Table Full -->

                    
                </div>
                <!-- END Page Content -->

@endsection