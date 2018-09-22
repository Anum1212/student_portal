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
    <title>{{ Auth::user()->name. '- Student' }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="/themeAssets/elaAdmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/themeAssets/elaAdmin/css/helper.css" rel="stylesheet">
    <link href="/themeAssets/elaAdmin/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


@section('head') @show
@section('style') @show
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
                        <b><img src="/themeAssets/elaAdmin/images/uol-logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="/themeAssets/elaAdmin/images/uol-text.png" alt="homepage" class="dark-logo" /></span>
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
                            <a href="{{ route('student.dashboard') }}">
                                <i class="text-primary fa fa-tachometer"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('student.viewAllMessages') }}">
                                <i class="text-success fa fa-envelope"></i>Messages</a>
                        </li>
                        <li>
                            <a href="{{ route('student.departmentAnnouncements') }}">
                                <i class="text-danger fa fa-building-o"></i>Department Alerts</a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="text-warning fa fa-cubes" aria-hidden="true"></i>
                                <span class="hide-menu">Society</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{ route('student.societyAnnouncements') }}">Society Alerts</a>
                                </li>
                                <li>
                                    <a href="{{ route('student.manageSocieties') }}">Manage Societies</a>
                                </li>
                            </ul>
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">@yield('pageTitle')</h3>
                </div>
            </div>
    @include('includes.message')
    @include('includes.error')
@section('body') @show
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="/themeAssets/elaAdmin/js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/themeAssets/elaAdmin/js/popper.min.js"></script>
    <script src="/themeAssets/elaAdmin/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/themeAssets/elaAdmin/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/themeAssets/elaAdmin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/themeAssets/elaAdmin/js/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/themeAssets/elaAdmin/js/custom.min.js"></script>
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
