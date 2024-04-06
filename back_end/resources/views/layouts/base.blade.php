<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="MkRqEzTGuoSx6LqJUm0OAKxSgNUYt26wTT7RMUZY">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="theme-color" content="#e87316">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Surfside Media">
    <meta name="msapplication-TileImage" content="{{asset('assets/images/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Surfside Media">
    <meta name="keywords" content="Surfside Media">
    <meta name="author" content="Surfside Media">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>SurfsideMedia</title>

    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/ion.rangeSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick/slick-theme.css') }}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo4.css') }}">
    <style>
        .h-logo {
            max-width: 185px !important;
        }

        .f-logo {
            max-width: 220px !important;
        }

        @media only screen and (max-width: 600px) {
            .h-logo {
                max-width: 110px !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @stack('styles')

</head>

<body class="theme-color4 light ltr">
    <style>
        header .profile-dropdown ul li {
            display: block;
            padding: 5px 20px;
            border-bottom: 1px solid #ddd;
            line-height: 35px;
        }

        header .profile-dropdown ul li:last-child {
            border-color: #fff;
        }

        header .profile-dropdown ul {
            padding: 10px 0;
            min-width: 250px;
        }

        .name-usr {
            background: #e87316;
            padding: 8px 12px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 24px;
        }

        .name-usr span {
            margin-right: 10px;
        }

        @media (max-width:600px) {
            .h-logo {
                max-width: 150px !important;
            }

            i.sidebar-bar {
                font-size: 22px;
            }

            .mobile-menu ul li a svg {
                width: 20px;
                height: 20px;
            }

            .mobile-menu ul li a span {
                margin-top: 0px;
                font-size: 12px;
            }

            .name-usr {
                padding: 5px 12px;
            }
        }
    </style>
    
    <x-Header.header>

    </x-Header-header>

    <div class="mobile-menu d-sm-none">
        <ul>
            <li>
                <a href="demo3.php" class="active">
                    <i data-feather="home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="align-justify"></i>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="shopping-bag"></i>
                    <span>Cart</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i data-feather="heart"></i>
                    <span>Wishlist</span>
                </a>
            </li>
            <li>
                <a href="user-dashboard.php">
                    <i data-feather="user"></i>
                    <span>Account</span>
                </a>
            </li>
        </ul>
    </div>

    @yield('content')

    <div id="qvmodal"></div>

    <footer class="footer-sm-space mt-5">
        <div class="main-footer">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-contact">
                            <div class="brand-logo">
                                <a href="{{route('app.index')}}" class="footer-logo float-start">
                                    <img src="{{asset('assets/images/logo.png')}}" class="f-logo img-fluid blur-up lazyload"
                                        alt="logo">
                                </a>
                            </div>
                            <ul class="contact-lists" style="clear:both;">
                                <li>
                                    <span><b>phone:</b> <span class="font-light"> +1 0000000000</span></span>
                                </li>
                                <li>
                                    <span><b>Address:</b><span class="font-light"> NIT, Faridabad, Haryana,
                                            India</span></span>
                                </li>
                                <li>
                                    <span><b>Email:</b><span class="font-light"> contact@surfsidemedia.in</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>About us</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="{{route('app.index')}}" class="font-dark">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{route('shop.index')}}" class="font-dark">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{route('app.aboutus')}}" class="font-dark">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('app.blog')}}" class="font-dark">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{route('app.contactus')}}" class="font-dark">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>New Categories</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="shop.html" class="font-dark">Shoes</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">Branded Jeans</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">New Jackets</a>
                                    </li>
                                    
                                    <li>
                                        <a href="shop.html" class="font-dark">Pc</a>
                                    </li>
                                    <li>
                                        <a href="shop.html" class="font-dark">Phone</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Get Help</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    
                                    <li>
                                        <a href="#" class="font-dark">Your Account</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#" class="font-dark">Your Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="#" class="font-dark">Shopping FAQs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                        <div class="footer-newsletter">
                            <h3>Let’s stay in touch</h3>
                            <div class="form-newsletter">
                                <div class="input-group mb-4">
                                    <input type="text" class="form-control color-4" placeholder="Your Email Address">
                                    <span class="input-group-text" id="basic-addon4"><i
                                            class="fas fa-arrow-right"></i></span>
                                </div>
                                <p class="font-dark mb-0">Keep up to date with our latest news and special offers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
  
    <div class="tap-to-top">
        <a href="#home">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <div class="bg-overlay"></div>
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick-animation.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/custom_slick.js') }}"></script>
    <script src="{{ asset('assets/js/price-filter.js') }}"></script>
    <script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/filter.js') }}"></script>
    <script src="{{ asset('assets/js/newsletter.js') }}"></script>
    <script src="{{ asset('assets/js/cart_modal_resize.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-setting.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    @stack('scripts')


</body>
</html>