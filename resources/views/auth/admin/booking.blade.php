<table class="table table-hover table-bordered table-condensed">
    <thead>
    <tr class="success">
        <th>Booking id</th>
        <th>Phòng</th>
        <th>Người đặt</th>
        <th>Email</th>
        <th>Điện thoại</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Chỉnh sửa</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 0; ?>

    @foreach ($booking_rooms as $booking_room)
        <?php $i++;?>
        @if($i%2==1)
            <tr class="info">
        @else
            <tr>
                @endif
                <td><b>{{$booking_room->booking_id}}</b></td>
                <td>{{$booking_room->room->name}}</td>
                <td>{{$booking_room->full_name}}</td>
                <td>{{$booking_room->email}}</td>
                <td>{{$booking_room->phone}}</td>
                <td>{{date('d-m-Y', strtotime($booking_room->check_in))}}</td>
                <td>{{date('d-m-Y', strtotime($booking_room->check_out))}}</td>

                <td><input type="button" class="btn btn-danger" value="Xóa" onclick="delete_bookings({{$booking_room->id}});"/></td>
            </tr>
            @endforeach

    </tbody>
</table>
<div>
    <div style="text-align:center;" class="booking">{{ $booking_rooms->links() }}</div>
</div>
