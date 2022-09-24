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
                    {{$order['details']['name']}}
                </td>
                <td>
                    {{$order['count']}}
                </td>
                <td>
                    {{$order['day'] ? \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($order['day'])) : 'ارسال روز'}}
                </td>
                <td>
                    {{$order['total'] }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>