@extends('layouts.main')

@section('content')
<div class="container position-relative">
    <div class="py-5 osahan-profile row">
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                <a href="profile.html" class="">
                    <div class="d-flex align-items-center p-3">
                        <div class="left mr-3">
                            <img alt="#" src="/main/img/user1.jpg" class="rounded-circle">
                        </div>
                        <div class="right">
                            <h6 class="mb-1 font-weight-bold">{{Auth::user()->fullName ? Auth::user()->fullName : 'کاربر تازه' }} <i class="feather-check-circle text-success"></i></h6>
                        </div>
                    </div>
                </a>
                <!-- profile-details -->
                <div class="bg-white profile-details">
                    <a data-toggle="modal" data-target="#exampleModal" class="d-flex w-100 align-items-center border-bottom p-3">
                        <div class="left mr-3">
                            <h6 class="font-weight-bold mb-1 text-dark">آدرس ها</h6>
                            <p class="small text-muted m-0">حذف کردن یا افزودن آدرس ها</p>
                        </div>
                        <div class="right ml-auto">
                            <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                        </div>
                    </a>
                    <a href="/user/orders" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                        <div class="left mr-3">
                            <h6 class="font-weight-bold m-0 text-dark"><i class="feather-truck bg-danger text-white p-2 rounded-circle mr-2"></i> سفارش ها</h6>
                        </div>
                        <div class="right ml-auto">
                            <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                        </div>
                    </a>
                    <a href="/user/contact" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                        <div class="left mr-3">
                            <h6 class="font-weight-bold m-0 text-dark"><i class="feather-phone bg-primary text-white p-2 rounded-circle mr-2"></i> تماس با پشتیبانی </h6>
                        </div>
                        <div class="right ml-auto">
                            <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                        </div>
                    </a>
                    <a href="/logout" class="d-flex w-100 align-items-center px-3 py-4">
                        <div class="left mr-3">
                            <h6 class="font-weight-bold m-0 text-dark"><i class="feather-lock bg-warning text-white p-2 rounded-circle mr-2"></i>خروج </h6>
                        </div>
                        <div class="right ml-auto">
                            <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-3">
            <div class="rounded shadow-sm p-4 bg-white">
                <h5 class="mb-4">حساب کاربری</h5>
                <div id="edit_profile">
                    <div>
                        <form action="/user/profile/update" method="post">
                            <div class="form-group">
                                <label for="firstName">نام</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" value="{{Auth::user()->firstName}}">
                            </div>
                            <div class="form-group">
                                <label for="lastName">نام خانوادگی</label>
                                <input type="text" class="form-control" id="lastName" value="{{Auth::user()->lastName}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1">شماره تلفن همراه</label>
                                <input type="number" disabled class="form-control" id="exampleInputNumber1" value="1234567890">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ایمیل</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">تصویر آواتار</label>
                                <input type="file" class="form-control" id="email" name="avatar" >
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">ذخیره تغییرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection