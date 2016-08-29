 <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            
                            <a class="h5 text-white" href="{{ URL::to('admin/dashboard') }}">
                                <span class="h4 font-w600 sidebar-mini-hide">{{getcong('site_name')}}</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <a class="{{classActivePath('dashboard')}}" href="{{ URL::to('admin/dashboard') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                                </li>
                                <li><a class="{{classActivePath('categories')}}" href="{{ URL::to('admin/categories') }}"><i class="fa fa-bars"></i>Categories</a></li>

                                 <li><a class="{{classActivePath('subcategories')}}" href="{{ URL::to('admin/subcategories') }}"><i class="fa fa-list-ul"></i>Sub Categories</a></li>

                                 <li><a class="{{classActivePath('locations')}}" href="{{ URL::to('admin/locations') }}"><i class="fa fa-location-arrow"></i>Locations</a></li>

                                 <li><a class="{{classActivePath('listings')}}" href="{{ URL::to('admin/listings') }}"><i class="fa fa-map-marker"></i>Listings</a></li>

                                 <li><a class="{{classActivePath('users')}}" href="{{ URL::to('admin/users') }}"><i class="fa fa-users"></i>Users</a></li>

                                 <li><a class="{{classActivePath('settings')}}" href="{{ URL::to('admin/settings') }}"><i class="fa fa-cog"></i>Settings</a></li> 
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->