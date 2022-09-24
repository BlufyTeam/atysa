
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ali ALaei">
    <meta name="author" content="Ali ALaei">
    <link rel="icon" type="image/png" href="/main/img/fav.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>فروشگاه آنلاین آتیسا</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="/main/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="/main/vendor/slick/slick-theme.min.css" />
    <!-- Feather Icon-->
    <link href="/main/vendor/icons/feather.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/main/css/style.css" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="/main/vendor/sidebar/demo.css" rel="stylesheet">
    @yield('style')
</head>

<body class="fixed-bottom-bar" style="direction: rtl">
    <header class="section-header">
        <section class="header-main shadow-sm bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-1">
                        <a href="/" class="brand-wrap mb-0">
                            <img alt="#" class="img-fluid" src="/main/img/logo_web.png">
                        </a>
                        <!-- brand-wrap.// -->
                    </div>
                    
                    <!-- col.// -->
                    <div class="col-11">
                        <div class="d-flex align-items-center justify-content-end">
                            <!-- signin -->
                            @if(Auth::guest())
                            <a href="/login" class="widget-header mr-4 text-dark m-none">
                                <div class="icon d-flex align-items-center">
                                    <i class="feather-user h6 mr-2 mb-0"></i> <span>ورود</span>
                                </div>
                            </a>
                            @else
                                <!-- my account -->
                                <div class="dropdown mr-4 m-none">
                                    <a href="#" class="dropdown-toggle text-dark py-3 d-block" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img alt="#" src="/main/img/user/1.jpg" class="img-fluid rounded-circle header-user mr-2 header-user"> سلام {{Auth::user()->fullName}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/user">پنل کاربری</a>
                                        <a class="dropdown-item" href="/user/plates">ساخت بشقاب شخصی</a>
                                        <a class="dropdown-item" href="/user/orders">سفارش ها</a>
                                        <a class="dropdown-item" href="/logout">خروج</a>
                                    </div>
                                </div>
                            @endif
                            <!-- signin -->
                            {{-- <a class="toggle" href="#">
                                <span></span>
                            </a> --}}
                        </div>
                        <!-- widgets-wrap.// -->
                    </div>
                    <!-- col.// -->
                </div>
                <!-- row.// -->
            </div>
            <!-- container.// -->
        </section>
        <!-- header-main .// -->
    </header>
    <div class="osahan-checkout">
        <div class="d-none">
            <div class="bg-primary border-bottom p-3 d-flex align-items-center">
                <a class="toggle togglew toggle-2" href="#"><span></span></a>
                <h4 class="font-weight-bold m-0 text-white">Checkout</h4>
            </div>
        </div>
        <!-- checkout -->
        @yield('content')
    </div>
    <!-- footer -->
    <footer class="section-footer border-top bg-dark">
        <div class="container">
            <section class="footer-top padding-y py-5">
                <div class="row pt-3">
                    <aside class="col-md-4 footer-about">
                        <article class="d-flex pb-3">
                            <div><img alt="#" src="/main/img/logo_web.png" class="logo-footer mr-3"></div>
                            <div>
                                <h6 class="title text-white">چرا آتیسا؟</h6>
                                <p class="text-muted">آتیسا با ارائه و توسعه سیستم یکپارچه سفارش غذای شرکتی اولین کترینگ ارائه کننده غذای رژیمی و سازمانی آنلاین در این عرصه می باشد.که کیفیت غذاهای خود را تضمین می کند.</p>
                                <div class="d-flex align-items-center">
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Facebook" target="_blank" href="https://www.facebook.com/atysair"><i class="feather-facebook"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Instagram" target="_blank" href="https://www.instagram.com/atysa.ir/"><i class="feather-instagram"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Linkedin" target="_blank" href="https://www.linkedin.com/company/atysa"><i class="feather-youtube"></i></a>
                                    <a class="btn btn-icon btn-outline-light mr-1 btn-sm" title="Twitter" target="_blank" href="https://www.twitter.com/atysair"><i class="feather-twitter"></i></a>
                                </div>
                            </div>
                        </article>
                    </aside>
                    <aside class="col-sm-4 col-md-4 text-white">
                        <h6 class="title">لینک های مفید</h6>
                        <ul class="list-unstyled hov_footer">
                            <li> <a href="https://atysa.ir/2022/04/16/%da%a9%d8%aa%d8%b1%db%8c%d9%86%da%af-%da%86%db%8c%d8%b3%d8%aa-%d8%9f/" class="text-muted">کترینگ سازمانی</a></li>
                            <li> <a href="https://atysa.ir/2022/04/16/%d8%aa%d9%87%db%8c%d9%87-%d8%ba%d8%b0%d8%a7%db%8c-%d8%b4%d8%b1%da%a9%d8%aa%db%8c/" class="text-muted">غذای شرکتی</a></li>
                            <li> <a href="https://atysa.ir/#" class="text-muted">سفارش آنلاین غذای سازمانی</a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-4 col-md-4 text-white">
                        <h6 class="title">ارتباط با ما</h6>
                        <ul class="elementor-icon-list-items">
							<li class="elementor-icon-list-item">دفتر مرکزی : جردن – خیابان سلطانی، تقاطع مهرداد</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="icon icon-map-marker1"></i>						</span>
										<span class="elementor-icon-list-text">کارخانه :  احمد آباد مستوفی گلستان چهارم کوچه صبا</span>
									</li>
								<li class="elementor-icon-list-item">
											<a href="tel:02191009949">

												<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="icon icon-phone-call"></i>						</span>
										<span class="elementor-icon-list-text">91009949</span>
											</a>
									</li>
								<li class="elementor-icon-list-item">
											<span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="icon icon-envelope2"></i>						</span>
										<span class="elementor-icon-list-text">info@atysa.ir</span>
									</li>
						</ul>
                    </aside>
                </div>
                <!-- row.// -->
            </section>
            <!-- footer-top.// -->
        </div>
        <!-- //container -->
        <section class="footer-copyright border-top py-3 bg-light">
            <div class="container d-flex align-items-center">
                <p class="mb-0">کلیه حقوق این پایگاه اطلاع رسانی متعلق به شرکت آتیه سازان می باشد. </p>
            </div>
        </section>
    </footer>
    <nav id="main-nav">
        <ul class="second-nav">
            <li><a href="home.html"><i class="feather-home mr-2"></i> Homepage</a></li>
            <li><a href="my_order.html"><i class="feather-list mr-2"></i> My Orders</a></li>
            <li>
                <a href="#"><i class="feather-edit-2 mr-2"></i> Authentication</a>
                <ul>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Register</a></li>
                    <li><a href="forgot_password.html">Forgot Password</a></li>
                    <li><a href="verification.html">Verification</a></li>
                    <li><a href="location.html">Location</a></li>
                </ul>
            </li>
            <li><a href="favorites.html"><i class="feather-heart mr-2"></i> Favorites</a></li>
            <li><a href="trending.html"><i class="feather-trending-up mr-2"></i> Trending</a></li>
            <li><a href="most_popular.html"><i class="feather-award mr-2"></i> Most Popular</a></li>
            <li><a href="restaurant.html"><i class="feather-paperclip mr-2"></i> Restaurant Detail</a></li>
            <li><a href="checkout.html"><i class="feather-list mr-2"></i> Checkout</a></li>
            <li><a href="successful.html"><i class="feather-check-circle mr-2"></i> Successful</a></li>
            <li><a href="map.html"><i class="feather-map-pin mr-2"></i> Live Map</a></li>
            <li>
                <a href="#"><i class="feather-user mr-2"></i> Profile</a>
                <ul>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="favorites.html">Delivery support</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                    <li><a href="terms.html">Terms of use</a></li>
                    <li><a href="privacy.html">Privacy & Policy</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="feather-alert-triangle mr-2"></i> Error</a>
                <ul>
                    <li><a href="not-found.html">Not Found</a>
                        <li><a href="maintence.html"> Maintence</a>
                            <li><a href="coming-soon.html">Coming Soon</a>
                </ul>
                </li>
                <li>
                    <a href="#"><i class="feather-link mr-2"></i> Navigation Link Example</a>
                    <ul>
                        <li>
                            <a href="#">Link Example 1</a>
                            <ul>
                                <li>
                                    <a href="#">Link Example 1.1</a>
                                    <ul>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Link Example 1.2</a>
                                    <ul>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                        <li><a href="#">Link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">Link Example 2</a></li>
                        <li><a href="#">Link Example 3</a></li>
                        <li><a href="#">Link Example 4</a></li>
                        <li data-nav-custom-content>
                            <div class="custom-message">
                                You can add any custom content to your navigation items. This text is just an example.
                            </div>
                        </li>
                    </ul>
                </li>
        </ul>
        <ul class="bottom-nav">
            <li class="email">
                <a class="text-danger" href="home.html">
                    <p class="h5 m-0"><i class="feather-home text-danger"></i></p>
                    Home
                </a>
            </li>
            <li class="github">
                <a href="faq.html">
                    <p class="h5 m-0"><i class="feather-message-circle"></i></p>
                    FAQ
                </a>
            </li>
            <li class="ko-fi">
                <a href="contact-us.html">
                    <p class="h5 m-0"><i class="feather-phone"></i></p>
                    Help
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
        <div class="row">
            <div class="col selected">
                <a href="home.html" class="text-danger small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-home text-danger"></i></p>
                    Home
                </a>
            </div>
            <div class="col">
                <a href="most_popular.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                    Trending
                </a>
            </div>
            <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
                <div class="bg-danger rounded-circle mt-n0 shadow">
                    <a href="checkout.html" class="text-white small font-weight-bold text-decoration-none">
                        <i class="feather-shopping-cart"></i>
                    </a>
                </div>
            </div>
            <div class="col">
                <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-heart"></i></p>
                    Favorites
                </a>
            </div>
            <div class="col">
                <a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-user"></i></p>
                    Profile
                </a>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/main/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/main/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="/main/vendor/slick/slick.min.js"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="/main/vendor/sidebar/hc-offcanvas-nav.js"></script>
    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="/main/js/osahan.js"></script>
    <script type="text/javascript" src="/main/js/custom.js"></script>
    @yield('script')
</body>

</html>