<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>{{getcong('site_name')}} Admin<</title>      
         
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ URL::asset('upload/'.getcong('site_favicon')) }}">


        <link rel="icon" type="image/png" href="{{ URL::asset('admin_assets/img/favicons/favicon-16x16.png') }}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{ URL::asset('admin_assets/img/favicons/favicon-32x32.png') }}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{ URL::asset('admin_assets/img/favicons/favicon-96x96.png') }}" sizes="96x96">
        <link rel="icon" type="image/png" href="{{ URL::asset('admin_assets/img/favicons/favicon-160x160.png') }}" sizes="160x160">
        <link rel="icon" type="image/png" href="{{ URL::asset('admin_assets/img/favicons/favicon-192x192.png') }}" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('admin_assets/img/favicons/apple-touch-icon-180x180.png') }}">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="{{ URL::asset('admin_assets/css/oneui.css') }}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Login Content -->
        <div class="content overflow-hidden">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <!-- Login Block -->
                    <div class="block block-themed animated fadeIn">
                        <div class="block-header bg-primary">
                            <ul class="block-options">
                                 
                                <li>
                                    <a href="{{ URL::to('admin/') }}" data-toggle="tooltip" data-placement="left" title="Log In"><i class="si si-login"></i></a>
                                </li>

                            </ul>
                            <h3 class="block-title">PASSWORD REMINDER</h3>
                        </div>
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Login Title -->
                            
                            @if(Session::has('flash_message'))
                        <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
                            {{ Session::get('flash_message') }}
                        </div>
                        @endif
                        <div class="message">
                            <!--{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}-->
                                @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                                
                       </div>
                            <!-- Login Form -->
                            <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                           
                                {!! Form::open(array('url' => 'admin/password/email','class'=>'js-validation-login form-horizontal push-30-t push-50','id'=>'passwordform','role'=>'form')) !!}
                               <div class="form-group">
                                    <label for="email">Reset password</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                            <button class="btn btn-block btn-primary" type="submit"><i class="si si-envelope-open pull-right"></i> Send Mail</button>
                                </div>
                                 
                            {!! Form::close() !!} 
                            <!-- END Login Form -->
                        </div>
                    </div>
                    <!-- END Login Block -->
                </div>
            </div>
        </div>
        <!-- END Login Content -->

        <!-- Login Footer -->
        <div class="push-10-t text-center animated fadeInUp">
            <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; OneUI 1.0</small>
        </div>
        <!-- END Login Footer -->

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="{{ URL::asset('admin_assets/js/core/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/jquery.scrollLock.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/jquery.appear.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/jquery.countTo.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/jquery.placeholder.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/core/js.cookie.min.js') }}"></script>
        <script src="{{ URL::asset('admin_assets/js/app.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ URL::asset('admin_assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
 
         
    </body>
</html>