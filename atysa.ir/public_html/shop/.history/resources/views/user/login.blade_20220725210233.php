<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="AliAlaei">
    <link rel="icon" type="image/png" href="/main/img/fav.png">
    <title>آتیسه سازان</title>
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
</head>

<body dir="rtl">
    <div class="login-page vh-100">
        <video loop autoplay muted id="vid">
            <source src="/main/img/bg.mp4" type="video/mp4">
            <source src="/main/img/bg.mp4" type="video/ogg">
            Your browser does not support the video tag.
         </video>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="px-5 col-md-6 ml-auto">
                <div class="px-5 col-10 mx-auto">
                    <h2 class="text-dark my-0">خوش آمدید</h2>
                    <p class="text-50">فقط کافیست شماره تلفن همراه خود را وارد نمایید.</p>
                    <form class="mt-5 mb-4" action="/login" method="post">
                        @csrf
                        @if($errors->any())
                            <p  class="text-danger mb-4 mt-3">{{$errors->first()}}</p>
                        @endif
                        <div class="form-group">
                            <label for="phone" class="text-dark">شماره تلفن همراه</label>
                            <input maxlength="11" type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">ورود/ثبت نام</button>
                    </form>
                </div>
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
</body>

</html>