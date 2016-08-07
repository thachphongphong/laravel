<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Chi Tiết Đặt Phòng</title>
</head>
<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;">
    <tr>
        <td align="center">
            <table width="700" border="0" cellpadding="0" cellspacing="0"
                   style="border: solid 1px #c4c4c4; border-radius: 5px;box-shadow:0 0 5px #666666;">
                <tr>
                    <td valign="top">
                        <table cellpadding="0" cellspacing="0" border="0" width="650" align="center"
                               style="border: solid 1px #e8e8e8">
                            <tr>
                                <td valign="top">
                                    <table width="630" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td align="center">
                                                <table width="630" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="left">
                                                            <br/>
                                                            Thân gửi <b>{{$booking->full_name}}</b>
                                                            <br/><br/>
                                                            Cám ơn quý khách! Quý khách đã đặt phòng tại khách sạn Pearl Sea
                                                            <br/>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table width="630" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                    <tr>
                                                        <td align="left">
                                                            <br/>

                                                            <h1><b>Thông tin chi tiết đặt phòng:</b></h1>
                                                            <br/>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <table width="630" cellpadding="0" cellspacing="0">
                                                    <tbody align="left">
                                                    <tr>
                                                        <td valign="top">
                                                            <b style="color: #f98131; border-bottom: solid 1px #e2e2e2;">Mã đặt
                                                                phòng:</b> {{$booking->booking_id}}
                                                        </td>
                                                        <td>
                                                            <b style="color: #f98131; border-bottom: solid 1px #e2e2e2;">Thời
                                                                gian</b>
                                                            <br/>
                                                            {{$booking->created_date->format('d-m-Y')}}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b style="color: #f98131; border-bottom: solid 1px #e2e2e2;">Email
                                                                nhận thông tin đặt phòng:</b>
                                                            <br/>
                                                            {{$booking->email}}
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td>
                                                            <b style="color: #f98131; border-bottom: solid 1px #e2e2e2;">Ngày
                                                                đến:</b>
                                                            <br/>
                                                            {{$booking->check_in->format('d-m-Y')}}
                                                        </td>
                                                        <td>
                                                            <b style="color: #f98131; border-bottom: solid 1px #e2e2e2;">Ngày
                                                                đi:</b>
                                                            <br/>
                                                            {{$booking->check_out->format('d-m-Y')}}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td valign="top">
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <br/>

                                                                        <h2>
                                                                            <b style="color: #f98131; border-bottom: solid 1px #e2e2e2;">Thông
                                                                                tin người đặt phòng</b>
                                                                        </h2>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Họ tên:</td>
                                                                    <td>  {{$booking->full_name}}</td>
                                                                </tr>
                                                                {{--<tr>--}}
                                                                    {{--<td> Địa chỉ:</td>--}}
                                                                    {{--<td>  {{$booking->address}}</td>--}}
                                                                {{--</tr>--}}
                                                                <tr>
                                                                    <td> Điện thoại:</td>
                                                                    <td>  {{$booking->phone}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table width="630" style="border-bottom: solid 1px #ccc;" cellpadding="0"
                                                       cellspacing="0">
                                                    <tbody align="left">
                                                    <tr>
                                                        <td align="left">
                                                            <table width="630" cellpadding="5" cellspacing="1"
                                                                   style="background:#fff;">
                                                                <thead style="background: #ddd;">
                                                                <tr>
                                                                    <th style="width: 20px;">STT</th>
                                                                    <th align="left" width="100">Tên phòng</th>
                                                                    <th align="center" width="100">Giá tiền</th>
                                                                    <th align="right" width="60">Số lượng</th>
                                                                    <th align="right" width="60">Số ngày</th>
                                                                    <th align="right" width="120">Thành tiền(VNĐ)</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody style="background:#eee;">
                                                                <?php $i = 0;
                                                                $total_price = 0;
                                                                $days = (strtotime($booking->check_out->format('d-m-Y')) - strtotime
                                                                                ($booking->check_in->format('d-m-Y')))
                                                                        / (60 * 60 * 24);
                                                                ?>
                                                                @foreach($rooms as $room)
                                                                    <tr>
                                                                        <td>{{$i}}</td>
                                                                        <td align='left'>{{$room->name}}<br/></td>
                                                                        <td align='right'>{{$room->price}}</td>
                                                                        <td align='center'> {{$booking->total_room}}</td>
                                                                        <td align='center'> {{$days}}</td>
                                                                        <td align='right'>{{$booking->total_money}}</td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td colspan="5" align="right">Tổng số tiền:</td>
                                                                    <td colspan="2" align="right"><b
                                                                                style="color: #ff0000">{{$booking->total_money}}</b>
                                                                    </td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <br/>

                                                <div style="width:630px;text-align:left">
                                                    <span style="color:#f98131"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <div style="width: 700px; text-align: justify; padding: 10px 40px 10px 40px; font-family: serif; ">
                                                    <p>Lần nữa, cảm ơn Quý khách đã đặt phòng tại <a style="color:#f98131">http://www.pearlseahotel.com</a>
                                                    </p>
                                                    <br/>
                                                    Trân trọng,
                                                    <br/>
                                                    <a style="color:#f98131">http://www.pearlseahotel.com/</a>
                                                </div>
                                                <br/>

                                                <div style="width: 700px; text-align: justify; padding: 10px 40px 10px 40px; "></div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</td>
</tr>
<tr>
</tr>
</table>

</body>
</html>