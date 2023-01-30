@extends("Layout.masteradmin")
@section("content")
<div style="width:100%; float:left; font-family: Helvetica; font-size:13px">
    <p style="float: right; text-align: right; padding-right:20px; line-height: 140%">
        Ngày Cập Nhật: {{date('d-m-Y')}}<br />
        Mã Đơn hàng: #{{$bill->id}}
    </p>
    <div style="float: left;">
        <strong style="font-size: 18px;">Tiệm Bánh Vân Mỹ</strong><br />
        <strong>Địa chỉ:</strong> 382 Võ Văn Tần, Quận 03 , TP.HCM , Việt Nam<br />
        <strong>Điện Thoại</strong> 0907079899<br />
        <strong>Website:</strong>Localhost:81/shop/public/index<br />
        <strong>Email:</strong> shop.vanmy@gmail.com
    </div>
    <div style="clear:both"></div>
    <table style="width: 100%">
        <tr>
            <td valign="top" style="padding: 0px; width: 45%; ">
                <h3 style="font-size: 14px;margin: 1.5em 0 3px 0;">Thông tin đơn hàng</h3>

                <hr style="border: none; border-top: 2px solid #0975BD;margin-bottom:3px;margin-top:3px;" />

                <div>
                    <strong style="margin-right:7px">Mã Đơn Hàng:</strong>#{{$bill->id}}<br />
                    <strong style="margin-right:7px">Ngày Đặt Hàng:</strong>{{$bill->date_order}}<br />

                    <strong style="margin-right:7px">Phương Thức Thanh Toán:</strong>{{$bill->payment}}
                    <br />
                </div>
            </td>
            <td valign="top" style="padding: 0px 20px;">
                <h3 style="font-size: 14px;margin: 1.5em 0 3px 0;">Thông tin mua hàng</h3>

                <hr style="border: none; border-top: 2px solid #0975BD;margin-bottom:3px;margin-top:3px;" />

                <div>
                    <strong>{{$customer->name}}</strong><br />
                    Địa chỉ: {{$customer->address}}<br />
                    Điện thoại: {{$customer->phone}}<br />
                    Email: {{$customer->email}}
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" valign="top" style="width: 100%">
                <h3 style="font-size: 14px;margin: 1.5em 0 3px 0;">Chi tiết đơn hàng</h3>

                <hr style="border: none; border-top: 2px solid #0975BD;margin-top:3px;margin-bottom:3px;" />

                <table style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:55%;text-align: left;margin-left:15px;padding: 5px 0px">Tên Bánh</th>
                            <th style="width:35%;text-align: center;padding: 5px 0px">Số lượng</th>
                            <th style="width:25%;text-align: right;padding: 5px 0px">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($billDetail as $billsDetail)
                        <tr valign="top" style="border-top: 1px solid #d9d9d9;">

                            <td align="left" style="padding: 5px 5px 5px 0px;white-space: pre-line;">{{$billsDetail->name}}</td>

                            <td align="center" style="padding: 5px 0px">{{$billsDetail->quantity }}</td>
                            <td align="right" style="padding: 5px 0px">{{number_format($billsDetail->unit_price)}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right; margin: 45px 0 1.5em 0; width: 31%;">
                    <table style="font-size: 12px;width: 100%; margin: 0 0 1.5em 0;">
                        <h3 style="font-size: 14px;margin: 0 0 1em 0;">Thông tin thanh toán</h3>
                        <tr>
                            <td style="padding: 5px 0px">Tổng tiền thanh toán</td>
                            <td style="text-align:right">{{number_format($bill->total)}}</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-2">&nbsp;</div>
                <form action="{{route('editbill',$bill->id)}}" method="post">
                    {{csrf_field()}}
                    <h3 style="font-size: 18px;margin: 0 0 1em 0;">Trạng thái đơn hàng</h3>
                    <fieldset>
                        <p style="line-height: 30px">
                            <input type="radio" name="state" value="0" {{$bill->state==0? "checked":""}} />
                            Chưa giao hàng
                            <input type="radio" name="state" value="1" {{$bill->state==1? "checked":""}} />
                            Đã giao hàng
                        </p>
                    </fieldset>
                    <p>
                        <input class="btn btn-primary" type="submit" name="capnhat" value="Cập Nhật Đơn Hàng" />
                    </p>
                </form>
                @if(Session::has("thongbao"))
                <div class="alert alert-success">{{Session::get("thongbao")}}</div>
                <div class="mt-2">
                    <a class="btn btn-primary" href="{{route('billslist')}}">Về Danh Sách Đơn Hàng</a>
                </div>

                @else
                <div class="mt-2">
                    <a class="btn btn-primary" href="{{route('billslist')}}">Về Danh Sách Đơn Hàng</a>
                </div>
                @endif
            </td>
        </tr>
    </table>
</div>
@endsection