@extends("Layout.masterAdmin")
@section("content")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách đơn đặt hàng
            <small>Danh sách</small>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tên khách hàng</th>
                <th>Tổng tiền</th>
                <th>Hình thức thanh toán</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $orders)
                <tr class="odd gradeX" align="center">
                    <td>{{$orders->id}}</td>
                    <td>{{$orders->date_order}}</td>
                    <td>{{$orders->name}}</td>
                    <td>{{number_format($orders->total)}} đồng</td>
                    <td>{{$orders->payment}}</td>
                    <td>{{$orders->note}}</td>
                    <td @if($orders->state==0)
                            style='background-color: red; border-radius:30px; color:white;'
                        @else
                            style='background-color: green; border-radius:30px; color:white;'
                        @endif > {{$orders->state==0 ? "Chưa giao hàng" : "Đã giao hàng"}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('editbill', $orders->id)}}">Cập nhật</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /.row -->
@endsection