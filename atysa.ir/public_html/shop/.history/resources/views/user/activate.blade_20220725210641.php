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
    <style>
        .timerbox{
            font-size: 17px;
            font-weight: bold;
            padding-bottom: 15px;
        }
    </style>
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ورود به حساب کاربری</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- App css -->
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .timerbox{
                font-size: 17px;
                font-weight: bold;
                padding-bottom: 15px;
            }
        </style>
    </head>

    <body class="authentication-bg authentication-bg-pattern" style="direction: rtl">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
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
                                    <p class="text-muted mb-4 mt-3">فقط کافیست کد ارسال شده به تلفن همراه خود را وارد نمایید.</p>
                                    @if($errors->any())
                                        <p  class="text-danger mb-4 mt-3">{{$errors->first()}}</p>
                                    @endif
                                </div>

                                <form action="/activate" method="post">
                                    @csrf
                                    <input type="hidden" name="phone" value="{{$phone}}" />
                                    <div class="form-group mb-3">
                                        <label style="float:right" for="code">کد</label>
                                        <input class="form-control" type="text" id="code" name="code" required="" placeholder="">
                                    </div>
                                    <div class="form-group mb-0 text-center timerbox">
                                        
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> ورود </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="/assets/js/app.min.js"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
        ></script>
        <script>
            $(document).ready(function(){

                buttonOrTimer('timer');
                $('body').on('click','.timerBtn', function(){
                    buttonOrTimer('btn');
                });
            });
            function buttonOrTimer(type){ 
                if(type == 'timer'){
                    var timer = 60;
                    var interval =  setInterval(() => {
                        timer = timer - 1;
                        $('.timerbox').empty();
                        $('.timerbox').text(timer);
                        if(timer == 0){
                            clearInterval(interval);
                            $('.timerbox').html('<button class="btn btn-success btn-block timerBtn" type="button"> ارسال مجدد کد </button>');
                        }

                    }, 1000);
                }else{
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/resend-activate',
                        type: "post",
                        data: { phone : {{$phone}}},
                    }).done(function (res) {
                        buttonOrTimer('timer');
                    }).fail(function (e) {
                        console.log(e);
                    });
                }

            }
        </script>
    </body>
</html>