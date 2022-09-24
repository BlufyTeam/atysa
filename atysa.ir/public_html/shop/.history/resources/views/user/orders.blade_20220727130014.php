@extends('layouts.main')

@section('content')
<div class="container position-relative">
    <div class="py-5 osahan-profile row">
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                <a href="/user" class="">
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>شماره</th>
                                    <th>مبلغ کل سفارش</th>
                                    <th>وضعیت</th>
                                    <th>مشاهده جزئیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            {{$order->total}}
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal delivery address -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/user/address/insert" method="post">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">آدرس ها</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>محله</th>
                                    <th>آدرس</th>
                                    <th>مشخصه آدرس</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->addresses as $address)
                                    <tr>
                                        <td>{{$address['area']}}</td>
                                        <td>{{$address['address']}}</td>
                                        <td>{{$address['option']}}</td>
                                        <td>
                                            <button type="button" data-id="{{$address['id']}}" class="removeAddress btn btn-danger">
                                                <i class="feather-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr/>
                        <h4>افزودن آدرس جدید</h4>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <label class="form-label">محله</label>
                                <div class="input-group">
                                    <input placeholder="" type="area" name="area" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label">آدرس کامل</label>
                                <input placeholder="" type="text" class="form-control" name="address">
                            </div>
                            <div class="mb-0 col-md-12 form-group">
                                <label class="form-label">مشخصه</label>
                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">
                                <input type="radio" name="options" id="option12" value="خانه">خانه
                            </label>
                                    <label class="btn btn-outline-secondary">
                                    <input type="radio" name="options" id="option22" value="محله کار"> محله کار
                            </label>
                                    <label class="btn btn-outline-secondary">
                            <input type="radio" name="options" id="option32" value="آدرس دیگران"> آدرس دیگران
                            </label>
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer p-0 border-0">
                    <div class="col-6 m-0 p-0">
                        <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">لغو</button>
                    </div>
                    <div class="col-6 m-0 p-0">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">ذخیره آدرس</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection