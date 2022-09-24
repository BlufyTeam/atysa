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