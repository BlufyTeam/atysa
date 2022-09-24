
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="AliAlaei">
    <link rel="icon" type="image/png" href="img/fav.png">
    <title>Swiggiweb - Online Food Ordering Website Template</title>
    <!-- Slick Slider -->
    <link rel="stylesheet" type="text/css" href="/main/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="/main/vendor/slick/slick-theme.min.css" />
    <!-- Feather Icon-->
    <link href="vendor/icons/feather.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Sidebar CSS -->
    <link href="vendor/sidebar/demo.css" rel="stylesheet">
</head>

<body>
    <div class="login-page vh-100">
        <video loop autoplay muted id="vid">
            <source src="img/bg.mp4" type="video/mp4">
            <source src="img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
        <div class="d-flex align-items-center justify-content-center vh-100">
            {{-- <div class="px-5 col-md-6 ml-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2 class="text-dark my-0">Welcome Back</h2>
                    <p class="text-50">Sign in to continue</p>
                    <form class="mt-5 mb-4" action="verification.html">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-dark">Email</label>
                            <input type="email" placeholder="Enter Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-dark">Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">SIGN IN</button>
                        <div class="py-2">
                            <button class="btn btn-lg btn-facebook btn-block"><i class="feather-facebook"></i> Connect with Facebook</button>
                        </div>
                    </form>
                    <a href="forgot_password.html" class="text-decoration-none">
                        <p class="text-center">Forgot your password?</p>
                    </a>
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="signup.html">
                            <p class="text-center m-0">Don't have an account? Sign up</p>
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="text-center w-75 m-auto">
                <div class="auth-logo">
                    <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-lg">
                            <img src="/main/images/atysa_logo.png" alt="" height="50">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light text-center">
                        <span class="logo-lg">
                            <img src="/main/images/atysa_logo.png" alt="" height="50">
                        </span>
                    </a>
                </div>
                <p class="text-muted mb-4 mt-3">فقط کافیست شماره تلفن همراه خود را وارد نمایید.</p>
                @if($errors->any())
                    <p  class="text-danger mb-4 mt-3">{{$errors->first()}}</p>
                @endif
            </div>

            <form action="/login" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label style="float: right;" for="phone">شماره تلفن همراه</label>
                    <input maxlength="11" class="form-control" type="text" id="phone" name="phone" required="" placeholder="">
                </div>

                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> ورود </button>
                </div>

            </form>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slick Slider JS-->
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <!-- Sidebar JS-->
    <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="js/osahan.js"></script>
</body>

</html>