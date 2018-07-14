<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <link rel="stylesheet" href="/themeAssets/css/bootstrap-wysihtml5.css" />
    <!-- Bootstrap Core CSS -->
    <link href="/themeAssets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/themeAssets/css/helper.css" rel="stylesheet">
    <link href="/themeAssets/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @section('head') @show @section('style') @show
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <img src="/themeAssets/images/logo.png" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <img src="/themeAssets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item">
                            <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="nav-item m-l-10">
                            <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="dropdown-user">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">{{ Auth::user()->name }}</li>
                        <li>
                            <a href="{{ route('societyAdmin.dashboard') }}">
                                <i class="text-primary fa fa-tachometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('societyAdmin.viewAllAnnouncements') }}">
                                <i class="text-danger fa fa-search"></i>
                                <span class="hide-menu">View Announcements</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('societyAdmin.addAnnouncementForm') }}">
                                <i class="text-success fa fa-bullhorn"></i>
                                <span class="hide-menu">Make Announcement</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            @include('includes.message') @include('includes.error') @section('body') @show

            <!-- footer -->
            {{--
            <footer class="footer"> © 2018 All rights reserved. Template designed by
                <a href="https://colorlib.com">Colorlib</a>
            </footer> --}}
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="/themeAssets/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/themeAssets/js/popper.min.js"></script>
    <script src="/themeAssets/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/themeAssets/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/themeAssets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/themeAssets/js/sticky-kit.min.js"></script>
    {{-- editor scripts --}}
    <script src="/themeAssets/js/wysihtml5-0.3.0.js"></script>
    <script src="/themeAssets/js/bootstrap-wysihtml5.js"></script>
    <script src="/themeAssets/js/wysihtml5-init.js"></script>
    <!--Custom JavaScript -->
    <script src="/themeAssets/js/custom.min.js"></script>
    {{-- confirm action script --}}
    <script src="/js/confirm.js"></script>
    <script src="{{ asset('js/bootstrap-imageupload.js') }}"></script>
    <script>
        // Image Upload
        var $imageupload = $('.imageupload');
        $imageupload.imageupload();

    </script>
    @section('script') @show
</body>

</html>
