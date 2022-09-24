<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h2 class="text-dark my-0">لطفا کد تایید را وارد نمایید.</h2>
                    <form class="mt-5 mb-4" action="/activate" method="post">
                        @csrf
                        <input type="hidden" name="phone" value="{{$phone}}" />
                        
                        @if($errors->any())
                            <p  class="text-danger mb-4 mt-3">{{$errors->first()}}</p>
                        @endif
                        <div class="form-group">
                            <label for="phone" class="text-dark">کد</label>
                            <input type="text" class="form-control" id="code" name="code" required>
                        </div>
                        <div class="timerbox">
                                        
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