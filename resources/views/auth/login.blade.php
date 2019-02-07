<html lang="en">

<head>
    <title>Student Portal</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/themeAssets/ezuca/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="/themeAssets/ezuca/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/themeAssets/ezuca/style.css">
    <style id="__web-inspector-hide-shortcut-style__" type="text/css">
        .__web-inspector-hide-shortcut__,
        .__web-inspector-hide-shortcut__ *,
        .__web-inspector-hidebefore-shortcut__::before,
        .__web-inspector-hideafter-shortcut__::after {
            visibility: hidden !important;
        }
    </style>
</head>

<body>
    <div class="hero-content">
        <header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid">
                    <!-- .row -->
                </div>
                <!-- .container-fluid -->
            </div>
            <!-- .top-header-bar -->

            <div class="nav-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-9 col-lg-3">
                            <div class="site-branding">
                                <h1 class="site-title"><a href="/" rel="home">University Of<span> Lahore</span></a></h1>
                            </div>
                            <!-- .site-branding -->
                        </div>
                        <!-- .col -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- .nav-bar -->
        </header>
        <!-- .site-header -->

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h1>University Of Lahore<br>Digital Notice Board</h1>
                            </header>
                            <!-- .entry-header -->

                        </div>
                        <!-- .hero-content-wrap -->
                    </div>
                    <!-- .col -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </div>
        <!-- .hero-content-hero-content-overlay -->
    </div>
    <!-- .hero-content -->

    <div class="icon-boxes">
        <div class="col-12 offset-lg-3 col-md-6">
            <div class="contact-form">
                <h3>Login</h3>
                @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}"> @csrf
                    <input type="email" placeholder="Your Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                        value="{{ old('email') }}" required>
                    <input type="password" placeholder="Your Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                        required>
                    <br>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                    <input type="submit" value="Login">
                    <div>
                        <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }} </a>
                    </div>
                </form>
            </div>
            <!-- .contact-form -->
        </div>
    </div>

    <div class="clients-logo">
        <div class="container">
            <!-- .row -->
            <footer class="site-footer">
                <div class="footer-widgets">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                                <div class="foot-contact">
                                    <h2>Contact Us</h2>

                                    <ul>
                                        <li>Email: info@uol.edu.pk</li>
                                        <li>Phone: +92 42 111-865-865</li>
                                        <li>Address: 1-km, bhobatian chowk، Defence Road, Lahore, Punjab, Pakistan</li>
                                    </ul>
                                </div>
                                <!-- .foot-contact -->
                            </div>
                            <!-- .col -->

                            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                                <div class="follow-us">
                                    <h2>Follow Us</h2>

                                    <ul class="follow-us flex flex-wrap align-items-center">
                                        <li><a href="https://www.facebook.com/University.Lahore"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://plus.google.com/u/0/+universityoflahore"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="https://twitter.com/ULahore"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- .quick-links -->
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </div>
                <!-- .footer-widgets -->

                <div class="footer-bar">
                    <div class="container">
                        <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-center">
                            <div class="col-12 col-lg-6">
                                <div class="download-apps flex flex-wrap justify-content-center justify-content-lg-start align-items-center">
                                    <b>
                                                <a class="text-success" href="https://github.com/Anum1212/student_portal">GitHub Link to code</a>
                                            </b>
                                    <br>
                                    <b>anamamer0@gmail.com</b>
                                </div>
                                <!-- .download-apps -->

                            </div>

                            <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                                <div class="footer-bar-nav">
                                    <ul class="flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                        <b class="text-success">built using</b>
                                        <li>Laravel</li>
                                        <li>ElaAdmin Template</li>
                                        <li>Ezuca Template</li>
                                        <li>Bootstrap 4</li>
                                        <li>Jquery</li>
                                    </ul>

                                </div>
                                <!-- .footer-bar-nav -->
                            </div>
                            <!-- .col-12 -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .container -->
                </div>
                <!-- .footer-bar -->
            </footer>
        </div>
        <!-- .container -->
    </div>
    <!-- .clients-logo -->

    <!-- .site-footer -->


</body>

</html>
