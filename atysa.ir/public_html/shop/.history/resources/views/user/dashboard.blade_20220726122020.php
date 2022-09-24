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
                            <h6 class="mb-1 font-weight-bold">{{Auth::user()->name ? Auth::user()->name : 'کاربر تازه' }} <i class="feather-check-circle text-success"></i></h6>
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
                    <a href="faq.html" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                        <div class="left mr-3">
                            <h6 class="font-weight-bold m-0 text-dark"><i class="feather-truck bg-danger text-white p-2 rounded-circle mr-2"></i> Delivery Support</h6>
                        </div>
                        <div class="right ml-auto">
                            <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                        </div>
                    </a>
                    <a href="contact-us.html" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                        <div class="left mr-3">
                            <h6 class="font-weight-bold m-0 text-dark"><i class="feather-phone bg-primary text-white p-2 rounded-circle mr-2"></i> تماس با پشتیبانی </h6>
                        </div>
                        <div class="right ml-auto">
                            <h6 class="font-weight-bold m-0"><i class="feather-chevron-right"></i></h6>
                        </div>
                    </a>
                    <a href="privacy.html" class="d-flex w-100 align-items-center px-3 py-4">
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
                <h5 class="mb-4">My account</h5>
                <div id="edit_profile">
                    <div>
                        <form action="my_account.html">
                            <div class="form-group">
                                <label for="exampleInputName1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputName1d" value="Gurdeep">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" value="Singh">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber1">Mobile Number</label>
                                <input type="number" class="form-control" id="exampleInputNumber1" value="1234567890">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" value="iamosahan@gmail.com">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="additional">
                        <div class="change_password my-3">
                            <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Change Password 
                      <i class="feather-arrow-right ml-auto"></i></a>
                        </div>
                        <div class="deactivate_account">
                            <a href="forgot_password.html" class="p-3 border rounded bg-white btn d-flex align-items-center">Deactivate Account 
                      <i class="feather-arrow-right ml-auto"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection