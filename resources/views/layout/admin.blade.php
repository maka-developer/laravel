<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>loodp</title>

    @section('h_link')
    <!--icheck-->
    <link href="{{ url('public/asset') }}/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="{{ url('public/asset') }}/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="{{ url('public/asset') }}/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="{{ url('public/asset') }}/js/iCheck/skins/square/blue.css" rel="stylesheet">

    <!--dashboard calendar-->
    <link href="{{ url('public/asset') }}/css/clndr.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ url('public/asset') }}/js/morris-chart/morris.css">

    <!--common-->
    <link href="{{ url('public/asset') }}/css/style.css" rel="stylesheet">
    <link href="{{ url('public/asset') }}/css/style-responsive.css" rel="stylesheet">
    @show
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="admin"><img src="{{ url('public/asset') }}/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="admin"><img src="{{ url('public/asset') }}/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only 包含手机版 -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="@yield('u_headimg')" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">@yield('u_name')</a></h4>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            @section('menu')
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="index.html"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-list"><a href=""><i class="fa fa-cogs"></i> <span>Components</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="grids.html"> Grids</a></li>
                        <li><a href="gallery.html"> Media Gallery</a></li>
                        <li><a href="calendar.html"> Calendar</a></li>
                        <li><a href="tree_view.html"> Tree View</a></li>
                        <li><a href="nestable.html"> Nestable</a></li>

                    </ul>
                </li>

                <li><a href="fontawesome.html"><i class="fa fa-bullhorn"></i> <span>Fontawesome</span></a></li>

                <li class="menu-list"><a href="#"><i class="fa fa-map-marker"></i> <span>Maps</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="google_map.html"> Google Map</a></li>
                        <li><a href="vector_map.html"> Vector Map</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-file-text"></i> <span>Extra Pages</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="profile.html"> Profile</a></li>
                        <li><a href="invoice.html"> Invoice</a></li>
                        <li><a href="pricing_table.html"> Pricing Table</a></li>
                        <li><a href="timeline.html"> Timeline</a></li>
                        <li><a href="blog_list.html"> Blog List</a></li>
                        <li><a href="blog_details.html"> Blog Details</a></li>
                        <li><a href="directory.html"> Directory </a></li>
                        <li><a href="chat.html"> Chat </a></li>
                        <li><a href="404.html"> 404 Error</a></li>
                        <li><a href="500.html"> 500 Error</a></li>
                        <li><a href="registration.html"> Registration Page</a></li>
                        <li><a href="lock_screen.html"> Lockscreen </a></li>
                    </ul>
                </li>
                <li><a href="login.html"><i class="fa fa-sign-in"></i> <span>Login Page</span></a></li>

            </ul>
            <!--sidebar nav end-->
            @show

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="@yield('u_headimg')" alt="" />
                            @yield('u_name')
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="{{ url('admin/setting') }}"><i class="fa fa-sign-out"></i> Setting</a></li>
                            <li><a href="{{ url('api/logout') }}"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        {{-- content --}}
        @section('content')

        @show
        {{-- end content --}}

    </div>
    <!-- main content end-->
</section>

{{-- link --}}
@section('link')
<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{ url('public/asset') }}/js/jquery-1.10.2.min.js"></script>
<script src="{{ url('public/asset') }}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{ url('public/asset') }}/js/jquery-migrate-1.2.1.min.js"></script>
<script src="{{ url('public/asset') }}/js/bootstrap.min.js"></script>
<script src="{{ url('public/asset') }}/js/modernizr.min.js"></script>
<script src="{{ url('public/asset') }}/js/jquery.nicescroll.js"></script>

<!--icheck -->
<script src="{{ url('public/asset') }}/js/iCheck/jquery.icheck.js"></script>
<script src="{{ url('public/asset') }}/js/icheck-init.js"></script>

<!--common scripts for all pages-->
<script src="{{ url('public/asset') }}/js/scripts.js"></script>
@show
{{-- end link --}}
</body>
</html>
