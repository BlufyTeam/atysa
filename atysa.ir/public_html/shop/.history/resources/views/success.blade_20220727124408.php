@extends('layouts.main')

@section('content')
<div class="py-5 osahan-coming-soon d-flex justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="text-center pb-3">
            <h1 class="font-weight-bold">سفارش شما با موفقیت ثبت شد.</h1>
            <p>وضعیت سفارش خود را از صفحه  <a href="/user/orders" class="font-weight-bold text-decoration-none text-primary">سفارش ها </a> می توانید پیگیری نمایید.</p>
        </div>
        <!-- continue -->
        <div class="bg-white rounded text-center p-4 shadow-sm">
            <h1 class="display-1 mb-4">🎉</h1>
            <h6 class="font-weight-bold mb-2">سفارش شما در حال پیگیری است.</h6>
            <p class="small text-muted">در زمان تعیین شده ارسال خواهد شد.</p>
        </div>
    </div>
</div>
@endsection