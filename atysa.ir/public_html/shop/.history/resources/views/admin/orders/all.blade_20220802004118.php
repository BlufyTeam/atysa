@extends('layouts.admin') 
@section('style')
<link href="/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">سفارش ها</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">سفارش ها</a></li>
                    <li class="breadcrumb-item active">مشاهده همه</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if(Session::has('removed'))
                <div class="alert alert-success" role="alert">
                    Removed Successfully
                </div>
                @endif
                @if(Session::has('updated'))
                <div class="alert alert-success" role="alert">
                    Updated Successfully
                </div>
                @endif
                <table id="datatable2" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>کاربر</th>
                            <th>مبلغ کل سفارش</th>
                            <th>وضعیت</th>
                            <th>وضعیت پرداخت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $key=>$row)
                        <tr>
                            <td>
                                {{\Morilog\Jalali\CalendarUtils::strftime('Y/m/d h:i', strtotime($row->created_at))}}
                            </td>
                            <td>
                                {{dd($row->ownerI)}}
                                {{$row->owner()->mobile}} - {{$row->owner()->full_name}}
                            </td>
                            <td>
                                {{number_format($row->total)}}
                            </td>
                            <td>
                                {{$row->status == 2 ? 'در حال بررسی' : 'ارسال شد'}}
                            </td>
                            <td>
                                {{$row->isPaid == true ? 'پرداخت شده' : 'پرداخت نشده'}}
                            </td>
                            <td>
                                <form action="/admin/orders/delete" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$row->id}}" />
                                    <button type="button" class="btn btn-danger waves-effect waves-light deleteButton">حذف</button>
                                </form>
                                <a href="/admin/orders/single/{{$row->id}}" class="btn btn-secondary waves-effect waves-light">تغییر وضعیت</a>
                                <button type="button" data-id="{{$row->id}}" class="moreDetails btn btn-success waves-effect waves-light">جزئیات بیشتر</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> 
                </table>
                <div class="moreData"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="/assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables/dataTables.bootstrap4.js"></script>
    <!-- Buttons examples -->
    <script src="/assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="/assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    {{-- <script src="/assets/libs/jszip/jszip.min.js"></script>
    <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script> --}}
    <script src="/assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="/assets/libs/datatables/buttons.print.min.js"></script>
    <!-- Responsive examples -->
    <script src="/assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="/assets/js/pages/datatables.init.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable2').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.3/i18n/fa.json'
                },
                "order": [ 0, 'desc' ]
            });
            $('.deleteButton').click(function(){
                var me = $(this);
                if (confirm("آیا اطمینان دارین؟")) {
                    me.parent().submit();
                }
            });
            $('body').on('click', '.moreDetails', function(){
                var orderId = $(this).attr('data-id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/user/orders/showmore',
                    type: "post",
                    data: {orderId: orderId}
                }).done(function (res) {
                    $(".moreData ").html(res);
                }).fail(function (e) {
                    console.log(e);
                });
            });


        });
    </script>
@endsection