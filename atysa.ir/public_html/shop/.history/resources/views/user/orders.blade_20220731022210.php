@extends('layouts.main')

@section('content')
<div class="container position-relative">
    <div class="py-5 osahan-profile row">
        <div class="col-md-4 mb-3">
            <div class="bg-white rounded shadow-sm sticky_sidebar overflow-hidden">
                <a href="/user" class="">
                    <div class="d-flex align-items-center p-3">
                        <div class="left mr-3">
                            <img style="height: 50px" alt="#" src="{{ Auth::user()->avatar ? '/'.Auth::user()->avatar :  '/main/img/user1.jpg' }}" class="rounded-circle">
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
            <h5 class="mb-4">سفارش ها</h5>
            <div class="rounded shadow-sm p-4 bg-white">
                <div id="edit_profile">
                    <div>
                        @if(count($orders) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>تاریخ</th>
                                    <th>مبلغ کل سفارش</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>مشاهده جزئیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d h:i', strtotime($order->created_at))}}
                                        </td>
                                        <td>
                                            {{$order->total}}
                                        </td>
                                        <td>
                                            {{$order->status == 2 ? 'در حال بررسی' : 'ارسال شد'}}
                                        </td>
                                        <td>
                                            {{$order->isPaid == true ? 'پرداخت شده' : 'پرداخت نشده'}}
                                        </td>
                                        <td>
                                            <button type="button" data-id="{{$order->_id}}" class="showMore btn btn-danger btn-sm">مشاهده جرئیات</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>هنوز سفارشی ثبت نکرده اید</p>
                        @endif
                        <div class="moreData">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection