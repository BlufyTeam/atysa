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
        @foreach($orders as $order)
            <tr>
                <td>
                    {{$order->_id}}
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