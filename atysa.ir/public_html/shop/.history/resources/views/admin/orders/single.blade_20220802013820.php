@extends('layouts.admin') 
@section('style')
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">جزئیات سفارش</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">جزئیات سفارش</a></li>
                    <li class="breadcrumb-item active">ویرایش</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
    
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" action="/admin/orders/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        <p  class="text-danger mb-4 mt-3">{{$errors->first()}}</p>
                    @endif
                    <input type="hidden" name="id" value="{{$order->id}}" />
                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">مشخصات مشتری</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" disabled value="{{$order->owner->mobile}} - {{$order->owner->full_name}}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">مبلغ کل</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" disabled value="{{number_format($order->price)}}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">وضعیت پرداخت</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" disabled value="{{$order->isPaid == true ? 'پرداخت شده' : 'پرداخت نشده'}}" />
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>نام غذا</th>
                                <th>تعداد</th>
                                <th>روز</th>
                                <th>مبلغ غذا</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order['products'] as $order)
                                <tr>
                                    <td>
                                        @if(isset($order['details']['userId']))
                                            {{$order['details']['name']}}
                                            <ul>
                                            @if($order['details']['materials'])
                                                @foreach($order['details']['materials'] as $mat)
                                                    <li>{{$mat['name']}}</li>
                                                @endforeach
                                            @endif
                                            </ul>
                                        @else
                                            {{$order['details']['name']}}
                                        @endif
                                        
                                    </td>
                                    <td>
                                        {{$order['count']}}
                                    </td>
                                    <td>
                                        {{$order['day'] ? \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($order['day'])) : 'ارسال روز'}}
                                    </td>
                                    <td>
                                        {{number_format($order['total']) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">وضعیت</label>
                        <div class="col-md-10">
                            <select name="status" class="form-control"  >
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection
@section('footer')
    <script src="/assets/libs/select2/js/select2.min.js"></script>
    <script src="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userId').select2();
        });
    </script>
@endsection