<table class="table table-condensed">
    <tbody>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>

    @foreach($order as $list)
        <tr>
            <th>#{{ $list->id }}</th>
            <th>{{ $list->product->pro_name ?? "[N\A]"}}</th>
            <th><img style="height:80px;width:80px" src="{{ $list->product->pro_avatar }}" alt=""></th>
            <th>{{ number_price($list->od_price,0,',','.') }}đ</th>
            <th>{{$list->od_qty }}</th>
            <th>{{ number_price($list->od_price *$list->od_qty ,0,',','.')}}đ</th>
        </tr>
    @endforeach

    </tbody>

</table>
