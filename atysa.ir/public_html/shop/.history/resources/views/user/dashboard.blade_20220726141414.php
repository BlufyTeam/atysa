@extends('layouts.main')

@section('content')
<div class="container position-relative">
    <div class="py-5 osahan-profile row">
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                <a href="profile.html" class="">
                    <div class="d-flex align-items-center p-3">
                        <div class="left mr-3">
                            <img style="height: 50px" alt="#" src="{{ Auth::user()->avatar ? Auth::user()->avatar :  '/main/img/user1.jpg' }}" class="rounded-circle">
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
                        <form action="/user/profile/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="firstName">نام</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" value="{{Auth::user()->firstName}}">
                            </div>
                            <div class="form-group">
                                <label for="lastName">نام خانوادگی</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{Auth::user()->lastName}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1">شماره تلفن همراه</label>
                                <input type="number" disabled class="form-control" id="exampleInputNumber1" value="{{Auth::user()->mobile}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ایمیل</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group">
                                <label for="file">تصویر آواتار</label>
                                <input type="file" class="form-control" id="file" name="file" >
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
<!-- modal delivery address -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">آفزودن آدرس جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="/user/address/insert" method="post">
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label class="form-label">محله</label>
                            <div class="input-group">
                                <input placeholder="Delivery Area" type="text" class="form-control">
                                <div class="input-group-append"><button type="button" class="btn btn-outline-secondary"><i class="feather-map-pin"></i></button></div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label class="form-label">آدرس کامل</label>
                            <input placeholder="" type="text" class="form-control">
                        </div>
                        <div class="mb-0 col-md-12 form-group">
                            <label class="form-label">مشخصه</label>
                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                <label class="btn btn-outline-secondary active">
                          <input type="radio" name="options" id="option12" checked> خانه
                          </label>
                                <label class="btn btn-outline-secondary">
                          <input type="radio" name="options" id="option22"> محله کار
                          </label>
                                <label class="btn btn-outline-secondary">
                          <input type="radio" name="options" id="option32"> آدرس دیگران
                          </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer p-0 border-0">
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">لغو</button>
                </div>
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn btn-primary btn-lg btn-block">ذخیره آدرس</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection