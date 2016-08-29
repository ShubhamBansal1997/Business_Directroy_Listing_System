@extends("admin.admin_app")

@section("content")

 <!-- Page Header -->
                <div class="content bg-image overflow-hidden" style="background-image: url('{{ URL::asset('admin_assets/img/photos/bg.jpg') }}');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn">Dashboard</h1>
                        <h2 class="h5 text-white-op animated zoomIn">Welcome Administrator</h2>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Stats -->
                <div class="content content-narrow">
                   <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover1 text-center" href="{{ URL::to('admin/categories') }}">
                                <div class="block-content block-content-full bg-primary">
                                    <i class="fa fa-bars fa-5x text-white"></i>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    <strong>{{$categories}}</strong> Categories
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover1 text-center" href="{{ URL::to('admin/subcategories') }}">
                                <div class="block-content block-content-full bg-modern-dark">
                                    <i class="fa fa-list-ul fa-5x text-white"></i>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    <strong>{{$subcategories}}</strong> Sub Categories
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover1 text-center" href="{{ URL::to('admin/locations') }}">
                                <div class="block-content block-content-full bg-success">
                                    <i class="fa fa-location-arrow fa-5x text-white"></i>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    <strong>{{$location}}</strong> Location
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover1 text-center" href="{{ URL::to('admin/listings') }}">
                                <div class="block-content block-content-full bg-modern">
                                    <i class="fa fa-map-marker fa-5x text-white"></i>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    <strong>{{$listings}}</strong> Listings
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover1 text-center" href="{{ URL::to('admin/users') }}">
                                <div class="block-content block-content-full bg-amethyst">
                                    <i class="fa fa-users fa-5x text-white"></i>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    <strong>{{$users}}</strong> Users
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <a class="block block-link-hover1 text-center" href="{{ URL::to('admin/settings') }}">
                                <div class="block-content block-content-full bg-city">
                                    <i class="fa fa-cog fa-5x text-white"></i>
                                </div>
                                <div class="block-content block-content-full block-content-mini">
                                    Settings
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Stats -->

                <!-- Page Content -->
                <div class="content">
                    <div class="row">
                       
                    </div>
                     
                </div>
                <!-- END Page Content -->

@endsection